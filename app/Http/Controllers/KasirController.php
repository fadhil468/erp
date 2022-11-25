<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\Bom;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('Kasir-Page.create',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        // Start Mo (Material Order)
   
        
        if($request->nama_produk == 'Bantal' && $request->size =='S')
        {
            $kain = bom::where('id',1)->first();
            $benang = bom::where('id',1)->first();
            $dakron = bom::where('id',1)->first();
        }
        elseif($request->nama_produk == 'Bantal' && $request->size =='M')
        {
            $kain = bom::where('id',2)->first();
            $benang = bom::where('id',2)->first();
            $dakron = bom::where('id',2)->first();
        }
        elseif($request->nama_produk == 'Bantal' && $request->size =='L')
        {
            $kain = bom::where('id',3)->first();
            $benang = bom::where('id',3)->first();
            $dakron = bom::where('id',3)->first();
        }
            //bahan baku bom x jumlah pemesanan
            $get_kain = $kain->kain * $request->jumlah ;
            $get_benang = $benang->benang * $request->jumlah ;
            $get_dakron = $dakron->dakron * $request->jumlah ;
        //end mo (making order)

        // Date Time
            $tanggal = date('d-m-Y, H:i');

        $boms=bom::find($request->id);

        $time = Carbon::now();
        $sunday = $time->isSunday();
        $estimasi = $boms->estimasi * $request->jumlah;
        $total_estimasi = pemesanan::sum('jumlah_estimasi');

        // cek jika jumlah melebihi 1 pemesanan
        if(pemesanan::count()>=1){
            $total_estimasi = pemesanan::sum('jumlah_estimasi') + $estimasi;
        }
        else{
            $total_estimasi = $estimasi;
        }
        
        // cek apakah hari minggu
        if($time == $sunday){
            $tambah_estimasi = $time->addMinutes($total_estimasi)->addDays(1);
        }
        else{
            $tambah_estimasi = $time->addMinutes($total_estimasi);
        }

        $hasil_estimasi = $tambah_estimasi;

        if($request->nama_produk == 'Bantal'){
            $kode_pesan = "PT-Bina-Karya-$request->size-$request->kode_produk";
        }
        //insert database
        Pemesanan::create([
            'id_produk'=> $request->id,
            'kode_pesanan'=>$kode_pesan,
            'nama_pemesan'=> $request->nama_pemesan,
            'kontak_pemesan'=> $request->kontak_pemesan,
            'alamat_pemesan'=> $request->alamat_pemesan,
            'kode_produk' =>$request->kode_produk,
            'nama_produk' =>$request->nama_produk,
            'size'=>$request->size,
            'harga'=>$request->harga,
            'jumlah'=>$request->jumlah,
            'kain'=>$get_kain,
            'benang'=>$get_benang,
            'dakron'=>$get_dakron,
            'status'=>0,
            'total'=>$request->total,
            'tanggal'=>$tanggal,
            'estimasi'=>$hasil_estimasi->format('d-m-Y,H:i'),
            'jumlah_estimasi' =>$total_estimasi
        ]);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function ajax(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="kode_produk" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }
    public function ajax1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="nama_produk" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }
    public function ajax2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic2 = $request->get('dynamic2');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic2 . '" name="ukuran_panjang" selected>' . ucfirst($row->$dynamic2) . '</option>';
        }
        echo $output;
    }
    public function ajax3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic3 = $request->get('dynamic3');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic3 . '" name="ukuran_panjang" selected>' . ucfirst($row->$dynamic3) . '</option>';
        }
        echo $output;
    }
    public function ajax4(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic4 = $request->get('dynamic4');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic4)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic4 . '" name="ukuran_panjang" selected>' . ucfirst($row->$dynamic4) . '</option>';
        }
        echo $output;
    }
    public function ajax5(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic5 = $request->get('dynamic5');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic5)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic5 . '" name="ukuran_panjang" selected>' . ucfirst($row->$dynamic5) . '</option>';
        }
        echo $output;
    }
    public function ajax6(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic6 = $request->get('dynamic6');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic6)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic6 . '" name="ukuran_panjang" selected>' . ucfirst($row->$dynamic6) . '</option>';
        }
        echo $output;
    }
}

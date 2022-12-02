<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rfq;
use App\Models\vendor;
use App\Models\konfirmasi_order;

use DB;
use Alert;
use Carbon\Carbon;

class RfqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfqs = RFQ::orderBy('id','desc')->paginate(10);
        return view('Rfq-Page.Rfq',compact('rfqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = vendor::all();
        return view('Rfq-Page.create',compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $kode_rfq = 'RFQ'.date('dmY');

        $rfq = rfq::create([
            'nama_vendor' => $request->nama_vendor,
            'kode_rfq' => $kode_rfq,
            'email_vendor' => $request->email_vendor,
            'telpon_vendor' => $request->telpon_vendor,
            'bahan_baku' => $request->bahan_baku,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tanggal_pesan' => $now->format('d-m-Y'),
            'status' => 1,
            'tanggal_confirm_vendor' => 'Menunggu Konfirmasi',
            'tanggal_pembayaran' => 'Belum ada tagihan',
        ]);

        $konfirmasi_order = konfirmasi_order::create([
            'id_vendor' => $request->id,
            'kode_rfq' => $kode_rfq,
            'nama_vendor' => $request->nama_vendor,
            'email_vendor' => $request->email_vendor,
            'telpon_vendor' => $request->telpon_vendor,
            'bahan_baku' => $request->bahan_baku,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tanggal_pesan' => $now->format('d-m-Y')
        ]);

        $konfirmasi_order = vendor::find($request->id);
        $count_order = $konfirmasi_order->request_order + 1;
        $update_vendor = vendor::where('id',$request->id)->update([
            'request_order' => $count_order
        ]);

        
        if($rfq && $konfirmasi_order){
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('rfq.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->route('rfq.index');
        }
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
    public function ayax(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="bahan_baku" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }
    public function ayax1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="harga" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }
    public function ayax2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic2 = $request->get('dynamic2');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic2 . '" name="nama_vendor" selected>' . ucfirst($row->$dynamic2) . '</option>';
        }
        echo $output;
    }
    public function ayax3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic3 = $request->get('dynamic3');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic3 . '" name="email_vendor" selected>' . ucfirst($row->$dynamic3) . '</option>';
        }
        echo $output;
    }
    public function ayax4(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic4 = $request->get('dynamic4');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic4)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic4 . '" name="telpon_vendor" selected>' . ucfirst($row->$dynamic4) . '</option>';
        }
        echo $output;
    }
}

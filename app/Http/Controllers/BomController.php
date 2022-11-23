<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bom;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bom = Bom::all();
        return view('Bom-Page.Bom',compact('bom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('Bom-Page.create',compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bom::create([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
            'size' =>$request->size,
            'kain'=>$request->kain,
            'benang'=>$request->benang,
            'dakron'=>$request->dakron,
            'quantity'=>1,
            'estimasi'=>$request->estimasi
        ]);
        return redirect()->route('bom.index');
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
    public function edit(Bom $bom)
    {
        $bom = Bom::find($bom->id);
        return view('Bom-Page.edit',compact('bom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bom $bom)
    {
        $bom->update([
            'kode'=> $request->kode,
            'nama'=> $request->nama,
            'size' =>$request->size,
            'kain'=>$request->kain,
            'benang'=>$request->benang,
            'dakron'=>$request->dakron,
            'quantity'=>1,
            'estimasi'=>$request->estimasi
        ]);
        return redirect()->route('bom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Bom::find($id);
        $delete->delete();
        return redirect()->route('bom.index');
    }

    //java script
    public function bom(Request $request)
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
    public function bom1(Request $request)
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
    public function bom2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic2 = $request->get('dynamic2');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic2 . '" name="kode_produk" selected>' . ucfirst($row->$dynamic2) . '</option>';
        }
        echo $output;
    }
}

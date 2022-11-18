<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bom;
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
        return view('Bom-Page.create');
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
            'kategori' =>$request->kategori,
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
            'kategori' =>$request->kategori,
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
}

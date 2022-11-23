<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use App\Models\bom;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('Pemesanan-Page.Pemesanan',compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemesanan-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemesanan::create($request->all());
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
    public function edit(Pemesanan $pemesanan)
    {
        $pemesanan = Pemesanan::find($pemesanan->id);
        return view('Pemesanan-page.edit',compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,pemesanan $pemesanan)
    { 
        $pemesanan->update ([
            'nama_pembeli' => $request->nama_pembeli,
            'kontak_pembeli' => $request->kontak_pembeli,
            'alamat_pembeli' => $request->alamat_pembeli,
            'kode_produk' => $request->kode_produk,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'total_harga' => $request->total_harga
        ]);
        return redirect()->route('pemesanan.index');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pemesanan::find($id);
        $delete->delete();
        return redirect()->route('pemesanan.index');
    }
}

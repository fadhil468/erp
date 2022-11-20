<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = vendor::all();
        return view('Vendor-Page.Vendor',compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Vendor-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408'
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/posts',$image->hashName());
        Vendor::create([
            'foto'=> $image->hashName(),
            'kode_vendor' => $request->kode_vendor,
            'nama_vendor' => $request->nama_vendor,
            'jenis_vendor' => $request->jenis_vendor,
            'email_vendor' => $request->email_vendor,
            'telpon_vendor' => $request->telpon_vendor,
            'bahan_baku' => $request->bahan_baku,
            'rekening_vendor' => $request->rekening_vendor,
        ]);
        return redirect()->route('vendor.index');
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
        $vendor = Vendor::find($vendor->id);
        return view('Vendor-page.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        //validate form
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408'
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/posts',$image->hashName());
        $vendor->update([
            'foto'=> $image->hashName(),
            'kode_vendor' => $request->kode_vendor,
            'nama_vendor' => $request->nama_vendor,
            'jenis_vendor' => $request->jenis_vendor,
            'email_vendor' => $request->email_vendor,
            'telpon_vendor' => $request->telpon_vendor,
            'bahan_baku' => $request->bahan_baku,
            'rekening_vendor' => $request->rekening_vendor,
        ]);
        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Vendor::find($id);
        $delete->delete();
        return redirect()->route('vendor.index');
    }
}

		
@extends('Layout.index')
@section('content')
	
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
@include('Layout.sidebar')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
        <form action="{{route('bahanbaku.update',$bahanbaku->id)}}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
                            <div style="margin-left: 1rem">
                                <td>
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="id_produk" value="{{$bahanbaku->id_produk}}" placeholder="" required>
                                </td>
                                <td>
                                    <label>Nama Bahan Baku</label>
                                    <input class="form-control" type="text" name="nama_bahan_baku" value="{{$bahanbaku->nama_bahan_baku}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Berat</label>
                                    <input class="form-control" type="text" name="berat_satuan" value="{{$bahanbaku->berat_satuan}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Jumlah</label>
                                    <input class="form-control" type="text" name="jumlah" value="{{$bahanbaku->jumlah}}"placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Harga</label>
                                    <input class="form-control" type="text" name="harga" value="{{$bahanbaku->harga}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Vendor</label>
                                    <input class="form-control" type="text" name="vendor" value="{{$bahanbaku->vendor}}" placeholder="" required>
                                </td>
                                </td>
                                <td>
                                    <label>Deskripsi Bahan Baku</label>
                                    <input class="form-control" type="text" name="deskripsi_bahan_baku" value="{{$bahanbaku->deskripsi_bahan_baku}}"placeholder="" required>
                                </td>
                                <td>
                                    <label>Stok</label>
                                    <input class="form-control" type="text" name="stok" value="{{$bahanbaku->stok}}"placeholder="" required>
                                </td>
                                <br>
                                <td>
                                    <div class="button-wrapper">
                                        <label for="inputImage" class="">
                                            <span class="d-none d-sm-block required-field">Upload new foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="foto" id="inputImage"
                                                class="form-control @error('foto') is-invalid @enderror" value="{{$bahanbaku->foto}}" required>
                                        </label>
                                        <p class="text-muted mt-1">Allowed JPG, JPEG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                </td>
                                <br>
                                <td>
                                    <button type="submit" class="btn btn-info" style="margin-left: 1.5rem">Simpan Data</button>
                                </td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
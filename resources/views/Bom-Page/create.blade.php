		
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
        <form action="{{route('bom.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
                            <div style="margin-left: 1rem">
                                <td>
                                    <label>Kode Produk</label>
                                    <input class="form-control" type="text" name="kode" placeholder="" required>
                                </td>
                                <td>
                                    <label>Nama Produk</label>
                                    <input class="form-control" type="text" name="nama" placeholder="" required>
                                </td>
                                <td>
                                    <label>Kain <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="kain" placeholder="" required>
                                </td>
                                <td>
                                    <label>Benang  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="benang" placeholder="" required>
                                </td>
                                <td>
                                    <label>Kategori  <span class="text-muted" style="font-weight: normal"> /cm</span></label>
                                    <input class="form-control" type="text" name="kategori" placeholder="" required>
                                </td>
                                <td>
                                    <label>Dakron</label>
                                    <input class="form-control" type="text" name="dakron" placeholder="" required>
                                </td>
                                <td>
                                    <label>Estimasi</label>
                                    <input class="form-control" type="text" name="estimasi" placeholder="" required>
                                </td>
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
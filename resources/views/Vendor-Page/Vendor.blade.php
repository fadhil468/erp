		
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
				<li class="active">Data Vendor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Vendor</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
				<a type="button" class="btn btn-primary btn-lg" href="{{ route ('vendor.create') }}">+</a>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Vendor</th>
                <th rowspan="2">Nama Vendor</th>
                <th rowspan="2">Jenis Vendor</th>
                <th colspan="2">Kontak</th>
                <th rowspan="2">Bahan Baku</th>
                <th rowspan="2">Rekening</th>
				<th rowspan="2">Gambar</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr>
                <th>E-mail</th>
                <th>No Telpon</th>
              </tr>
            </thead>
			<!-- Batas belum dikerjakan -->
            <tbody class="text-center">
                @foreach ($vendor as $ven)
                <tr>
                    <td>{{$ven->id}}</td>
                    <td>{{$ven->kode_vendor}}</td>
                    <td>{{$ven->nama_vendor}}</td>
                    <td>{{$ven->jenis_vendor}}</td>
                    <td>{{$ven->email_vendor}}</td>
                    <td>{{$ven->telpon_vendor}}</td>
                    <td>{{$ven->bahan_baku}}</td>
                    <td>{{$ven->rekening_vendor}}</td>
                    <td>
						<img width="50" height="50"
						src="{{ Storage::url('public/posts/') . $ven->foto }}">
                    <td>
                    <td>
						<form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('vendor.destroy', $ven->id) }}" method="POST">
                            <a href="{{ route('vendor.edit', $ven->id) }}"
                                class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection
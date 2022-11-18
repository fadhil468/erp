		
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
			<a type="button" class="btn btn-primary" href="{{ route ('pemesanan.create') }} ">+</a>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Kontak Pembeli</th>
                <th scope="col">Alamat Pembeli</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Total Harga</th>
				<th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $pemesanan )
                <tr style="text-align: center">
                    <td>{{$pemesanan->id}}</td>
                    <td>{{$pemesanan->nama_pembeli}}</td>
					<td>{{$pemesanan->kontak_pembeli}}</td>
                    <td>{{$pemesanan->alamat_pembeli}}</td>
                    <td>{{$pemesanan->kode_produk}}</td>
                    <td>{{$pemesanan->jumlah_pesanan}}</td>
                    <td>Rp. @idr($pemesanan->total_harga)</td>
                    <td>
					<form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('pemesanan.destroy', $pemesanan->id) }}" method="POST">
                            <a href="{{ route('pemesanan.edit', $pemesanan->id) }}"
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
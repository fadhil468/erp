		
@extends('Layout.index')
@section('content')
	
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
@include('Layout.sidebar')
@include('sweetalert::alert')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Mark As Done</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mark As Done</h1>
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
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Pesanan</th>
                <th colspan="3">Data Pemesan</th>
                <th colspan="4">Data Produk</th>
				<th rowspan="2">Jumlah Pesanan</th>
                <th colspan="3">Data Bahan Baku</th>
				<th rowspan="2">Total Harga</th>
				<th rowspan="2">Status</th>
				<th rowspan="2">Tanggal Pesan</th>
				<th rowspan="2">Hasil Jadi</th>
				<th rowspan="2">Action</th>
              </tr>
			  <tr>
                <th >Nama Pemesan</th>
                <th >Kontak Pemesan</th>
                <th >Alamat Pemesan</th>
				<th >Kode Produk</th>
                <th >Nama Produk</th>
                <th >Size</th>
				<th >Harga</th>
				<th >Kain</th>
				<th >Benang</th>
				<th >Dakron</th>
			  </tr>
            </thead>
            <tbody>
                @foreach ($mads as $mad )
                <tr style="text-align: center">
                    <td>{{$mad->id}}</td>
                    <td>{!! DNS1D::getBarcodeHtml($mad->kode_pesanan,'C39', 0.5,25) !!}
							<p style="font-size: 10px; margin-top: 5px">
							{{$mad->kode_pesanan}}</p>
					</td>
                    <td>{{$mad->nama_pemesan}}</td>
					<td>{{$mad->kontak_pemesan}}</td>
                    <td>{{$mad->alamat_pemesan}}</td>
                    <td>{{$mad->kode_produk}}</td>
                    <td>{{$mad->nama_produk}}</td>
                    <td>{{$mad->size}}</td>
                    <td>{{$mad->harga}}</td>
                    <td>{{$mad->jumlah}}</td>
                    <td>{{$mad->kain}} <small>m</small></td>
                    <td>{{$mad->benang}} <small>m</small></td>
                    <td>{{$mad->dakron}} <small>g</small></td>
                    <td>Rp. @idr($mad->total)</td>
					<td>{{$pemesanan->tanggal}}</td>
					<td>{{$pemesanan->estimasi}}</td>
                    <td>
					<form action="{{ route('pemesanan.proses', $pemesanan->id) }}" method="POST">
						@csrf
                            <button type="submit" class="btn btn-sm btn-danger">Proses</button>                            
                        </form>
						<a href="{{ route('pemesanan.edit', $pemesanan->id) }}"
							class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection
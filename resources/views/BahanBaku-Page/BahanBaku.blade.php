		
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
				<li class="active">Data Bahan Baku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Bahan Baku</h1>
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
				<a type="button" class="btn btn-primary btn-lg" href="{{ route ('bahanbaku.create') }} ">+</a>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama Bahan Baku</th>
                <th scope="col">Berat Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Vendor</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Stok</th>
                <th scope="col">Foto</th>
				<th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bahanbakus as $bahanbaku )
                <tr style="text-align: center">
                    <td>{{$bahanbaku->id}}</td>
                    <td>{{$bahanbaku->id_produk}}</td>
                    <td>{{$bahanbaku->nama_bahan_baku}}</td>
                    <td>{{$bahanbaku->berat_satuan}}</td>
                    <td>Rp. @idr ($bahanbaku->harga)</td>
                    <td>{{$bahanbaku->vendor}}</td>
                    <td>{{$bahanbaku->deskripsi_bahan_baku}}</td>
                    <td>
						@if ($bahanbaku->stok == 0)
							<span class="badge bg-danger">Belum Tersedia</span>
						@elseif ($bahanbaku->stok >0)
							@if($bahanbaku == 'Kain')
							<span class="badge bg-primary me-2" >{{$bahanbaku->stok}} <small>meter</small></span>	
						@elseif ($bahanbaku == 'Benang')
								<span class="badge bg-primary me-2" >{{$bahanbaku->stok}} <small>roll</small></span>
						@elseif ($bahanbaku == 'Dakron')
								<span class="badge bg-primary me-2" >{{$bahanbaku->stok}} <small>gram</small></span>
							@endif
						@endif
					</td>
                    <td>
                        <img width="50" height="50"
                            src="{{ Storage::url('public/posts/') . $bahanbaku->foto}}" alt="">
                    </td>
					<td>
						<a href="{{route('rfq.create',$bahanbaku->id)}}" class="btn btn-sm btn-info">Order</a>
					</td>
                </tr>
                @endforeach
            </tbody>
@endsection
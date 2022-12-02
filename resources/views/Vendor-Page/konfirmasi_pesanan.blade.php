		
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
				<a type="button" class="btn btn-primary btn-lg" href="{{ route ('datavendor.create') }}">+</a>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kode RFQ</th>
                <th colspan="3">Data Vendor</th>
                <th colspan="2">Data Bahan</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Total Harga</th>
				<th rowspan="2">Tanggal Pemesanan</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr>
                <th>Nama Vendor</th>
                <th>Kontak</th>
                <th>Email Vendor</th>
				<th>Bahan</th>
                <th>Harga</th>
              </tr>
            </thead>
			<!-- Batas belum dikerjakan -->
            <tbody class="text-center">
                @foreach ($konfirmasis as $ko)
                <tr>
                    <td>{{$ko->id}}</td>
                    <td>{!! DNS1D::getBarcodeHTML($ko->kode_rfq, 'C39', 0.8, 30) !!}
                        <p style="font-size: 10px; margin-top: 5px;">
                            {{ $ko->kode_rfq }}</p></td>
                    <td>{{$ko->nama_vendor}}</td>
                    <td>{{$ko->telpon_vendor}}</td>
                    <td>{{$ko->email_vendor}}</td>
                    <td>{{$ko->bahan_baku}}</td>
                    <td>{{$ko->harga}}</td>
                    <td>{{$ko->quantity}}</td>
                    <td>{{$ko->total}}</td>
                    <td>{{$ko->tanggal_pesan}}</td>
                    <td>
                        <a href="{{route('konfirmasi.confirm',['id'=> $ko->id,'kode_rfq'=>$ko->kode_rfq])}}" class="btn btn-success me-2"><i class="fa fa-check-circle" aria-hidden="true"></i>
                            Konfirmasi Order</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
		</table>
		<script></script>
@endsection
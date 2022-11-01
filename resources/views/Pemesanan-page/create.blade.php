		
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
        <form action="{{route('pemesanan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h4 class="card-header">Tambah Data</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6 no-padding">
                            <div style="margin-left: 1rem">
                                <td>
                                    <label>Nama Pembeli</label>
                                    <input class="form-control" type="text" name="nama_pembeli" placeholder="" required>
                                </td>
                                <td>
                                    <label>Kontak Pembeli</label>
                                    <input class="form-control" type="text" name="kontak_pembeli" placeholder="" required>
                                </td>
                                <td>
                                    <label>Alamat Pembeli</label>
                                    <input class="form-control" type="text" name="alamat_pembeli" placeholder="" required>
                                </td>
                                <td>
                                    <!-- pakai combo box -->                                   
                                    <label for="defaultSelect" class="form-label required-field">Kode Produksi</label>
                                    <select id="defaultSelect" name="kode_produk" class="form-select" required>
                                        <option disabled selected >-- Pilih Barang --</option>
                                        @foreach ($barang as $barang)
                                            <option value="{{ $barang->harga }}" id="harga_produk" onchange="pesan()">
                                                {{ $barang->kode_produk}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <br>
                                <td>
                                    <!-- Method otomatis mengkalikan nilai harga_produk dengan jumlah_pesanan -->
                                    <label>Jumlah Pesanan</label>
                                    <input class="form-control" type="text" id="jumlah" name="jumlah_pesanan" placeholder="" onchange="pesan()" required>
                                </td>
                                
                                <td>
                                    <!-- Total harga = harga_produk * jumlah_pesanan -->
                                    <label>Total Harga</label>
                                    <input class="form-control" type="text" id="total" name="total_harga" placeholder="" disabled readonly  required>
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
        <script src="../assets/js/pemesanan.js"></script>

@endsection
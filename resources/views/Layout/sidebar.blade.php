<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="../assets/gambar/admin.png" class="img-responsive" alt="Image">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class=""{{ request()->is('') ? 'active' : '' }}""><a href="/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Data Pemesanan <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="{{ request()->is('kasir*') ? 'active' : '' }}" href="{{route('kasir.index')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Kasir
					</a></li>
					<li><a class="{{ request()->is('pemesanan*') ? 'active' : '' }}" href="{{route('pemesanan.index')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Data MO
					</a></li>
					<li><a class="{{ request()->is('mad*') ? 'active' : '' }}" href="{{route('mad.index')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Mad
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Data Barang & Bahan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="{{ request()->is('barang*') ? 'active' : '' }}" href="{{route('barang.index')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Barang
					</a></li>
					<li><a class="{{ request()->is('bahanbaku*') ? 'active' : '' }}" href="{{route('bahanbaku.index')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Data Bahan Baku
					</a></li>
				</ul>
			</li>
			<li><a class="{{ request()->is('bom*') ? 'active' : '' }}" href="{{route('bom.index')}}">
				<span class="fa fa-arrow-right">&nbsp;</span> Data Bom
			</a></li>
			<li><a class="{{ request()->is('vendor*') ? 'active' : '' }}" href="{{route('datavendor.index')}}">
				<span class="fa fa-arrow-right">&nbsp;</span> Data Vendor
			</a></li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
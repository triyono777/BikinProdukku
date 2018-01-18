@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<!-- title row -->
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-handshake-o"></i> Sub Detail Transaksi
			</h2>
		</div>
		<div class="box-body">
			<div class="col-md-6 col-xs-12">
					<h3><b>#{{$detailTransaksi['kode_invoice']}}</b></h3>
					<h3>{{$detailTransaksi['nama_produk']}}</h3>
			</div>
			<div class="col-md-6 col-xs-12">
				<span class="pull-right">
					<h3>Sub Total : {{number_format($detailTransaksi['subtotal'])}}</h3>
				</span>
			</div>

			<div class="col-md-12 col-xs-12">
				<div class="table-responsive">
					<table id="datatables" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Bahan</th>
								<th>Jumlah</th>
								<th>Sub Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sub_detail_transaksi as $key => $value)
								<tr>
									<td>{{++$key}}</td>
									<td>{{$value['nama_bahan']}}</td>
									<td>{{$value['jumlah']}}</td>
									<td>{{$value['subtotal']}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="box">
		<!-- title row -->
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-search"></i> Rincian Produk
			</h2>
		</div>
		<div class="box-body">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
</div>
@endsection
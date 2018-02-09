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
					<h3>Sub Total : {{number_format($sub_detail_transaksi->sum('subtotal'))}}</h3>
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
</div>
<div class="col-md-12">
	<div class="box">
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-hastag"></i> TagLine
			</h2>
		</div>
		<div class="box-body">
			<h4>{{$tagline['nama']}}</h4>
			<hr>
			<p>{!! $tagline['isi'] !!}</p>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box">
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-image"></i> Gambar Produk
			</h2>
		</div>
		<div class="box-body">
			@if($detailTransaksi['gambar_produk'] != null)
				<img src="{{URL::to('upload/gambar-produk-pengguna/'. $detailTransaksi['gambar_produk'])}}" class="img-thumbnail">
			@else
				<span class="badge">Belum upload gambar</span>
			@endif
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box">
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-image"></i> Gambar Logo
			</h2>
		</div>
		<div class="box-body">
			@if($detailTransaksi['gambar_logo'] != null)
				<img src="{{URL::to('upload/gambar-logo-pengguna/'. $detailTransaksi['gambar_logo'])}}" class="img-thumbnail">
			@else
				<span class="badge">Belum upload gambar</span>
			@endif
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box">
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-image"></i> Gambar Sendiri
			</h2>
		</div>
		<div class="box-body">
			@if($detailTransaksi['gambar_sendiri'] != null)
				<img src="{{URL::to('upload/gambar-sendiri-pengguna/'. $detailTransaksi['gambar_sendiri'])}}" class="img-thumbnail">
			@else
				<span class="badge">Belum upload gambar</span>
			@endif
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="box">
		<!-- title row -->
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-search"></i> Rincian Produk
			</h2>
		</div>
		<div class="box-body">
			{!! $detailTransaksi['caption'] !!}
		</div>
	</div>
</div>
@endsection
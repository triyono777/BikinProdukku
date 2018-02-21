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
				<h3><b>#{{$kode_invoice}}</b></h3>
				<h3>{{$detailTransaksi['nama_produk']}}</h3>
			</div>
			<div class="col-md-6 col-xs-12">
				<span class="pull-right">
					<h3>Sub Total : {{number_format($detailTransaksi->subDetailTransaksi->sum('subtotal'))}}</h3>
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
							@foreach($detailTransaksi->subDetailTransaksi as $key => $value)
							<tr>
								<td>{{++$key}}</td>
								<td>{{$value['nama_bahan']}}</td>
								<td>{{$value['jumlah']}}</td>
								<td>{{number_format($value['subtotal'])}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Varian Rasa</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detailTransaksi['transVarian'] as $key => $value)
							<tr>
								<td>{{$value['varian']['nama_varian']}}</td>
								<td>{{$value['jumlah']}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<tr>
							<th>Ukuran Kemasan</th>
							<td>{{$detailTransaksi['kemasan']['ukuran']}}</td>
						</tr>
						<tr>
							<th>Jumlah Kemasan</th>
							<td>{{$detailTransaksi['minimalPembelian']['jumlah_pembelian']}}</td>
						</tr>
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
			<form method="post" id="frm-tagline">
				<input type="text" name="nama" value="{{$tagline['nama']}}" class="form-control">
				<input type="hidden" name="id" value="{{$tagline['id_tagline']}}">
				<hr>
				<textarea class="form-control textarea" name="isi">{{$tagline['isi']}}</textarea>
				<button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
			</form>
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
			<a href="{{URL::to('upload/gambar-produk-pengguna/'. $detailTransaksi['gambar_produk'])}}">
				<img src="{{URL::to('upload/gambar-produk-pengguna/'. $detailTransaksi['gambar_produk'])}}" class="img-thumbnail">
			</a>
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
			<a href="{{URL::to('upload/gambar-logo-pengguna/'. $detailTransaksi['gambar_logo'])}}">
				<img src="{{URL::to('upload/gambar-logo-pengguna/'. $detailTransaksi['gambar_logo'])}}" class="img-thumbnail">
			</a>
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
			<a href="{{URL::to('upload/gambar-sendiri-pengguna/'. $detailTransaksi['gambar_sendiri'])}}">
				<img src="{{URL::to('upload/gambar-sendiri-pengguna/'. $detailTransaksi['gambar_sendiri'])}}" class="img-thumbnail">
			</a>
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
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#frm-tagline').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('tagline.update', [$id, $subId])}}", data, function(data) {
			console.log(data);
			alertify.success('Data berhasil di update !');
		})
	})
</script>
@endsection
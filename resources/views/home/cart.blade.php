@extends('home.templates.app2')
@section('content')
<div class="col-md-12 col-xs-12" style="margin-top: 100px">
	@if($formulir == null && auth()->guard('pengguna')->check())
	<div class="container">
		<h4 align="center">Untuk Pemesanan,Isi Formulir Pendaftaran berikut</h4>
		<div class="card" style="margin-bottom: 50px">
			<div class="card-header bg-warning">
				Formulir Pendaftaran
			</div>
			<form action="{{route('formulirPost')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td>
									<input type="text" name="nik" class="form-control" required="">
								</td>
							</tr>
							<tr>
								<td>Nama Lengkap</td>
								<td>:</td>
								<td>
									<input type="text" name="nama_lengkap" class="form-control" required="">
								</td>
							</tr>
							<tr>
								<td>Tempat</td>
								<td>:</td>
								<td>
									<input type="text" name="tempat" class="form-control" required="">
								</td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>:</td>
								<td>
									<input type="date" name="tgl_lahir" class="form-control" required="">
								</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>
									<select class="form-control" required="" name="jenis_kelamin">
										<option value="pria">Pria</option>
										<option value="wanita">Wanita</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Status Perkawinan</td>
								<td>:</td>
								<td>
									<select class="form-control" name="status_perkawinan" required="">
										<option disabled="" selected="">-status perkawinan-</option>
										<option value="kawin">Kawin</option>
										<option value="belum kawin">Belum Kawin</option>
										<option value="janda">Janda</option>
										<option value="duda">Duda</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>pekerjaan</td>
								<td>:</td>
								<td>
									<input type="text" name="pekerjaan" class="form-control" required="">
								</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td>
									<textarea name="alamat" required="" class="form-control" id="pekerjaan" rows="3"></textarea>
								</td>
							</tr>
							<tr>
								<td>Foto</td>
								<td>:</td>
								<td>
									<input type="file" required="" name="foto" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Motivasi Berbisnis</td>
								<td>:</td>
								<td>
									<input type="text" required="" name="motivasi_berbisnis" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td>:</td>
								<td>
									<input type="text" required="" name="hobi" class="form-control">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<br>
					<button type="submit" class="btn btn-block btn-primary pull-right">Simpan</button>
			</form>
		</div>
	</div>
	@endif
	@if($formulir != null || !auth()->guard('pengguna')->check())
	<div class="card">
		<div class="card-header">
			<h5>
			Keranjang Belanja <i class="fa fa-shopping-cart"></i>
			@if($transaksi['gambar_bukti'] == null)
			<span class="pull-right badge badge-danger">Status: Belum Upload bukti pembayaran</span>
			@elseif($transaksi['gambar_bukti'])
			<span class="pull-right badge badge-warning">Status: Proses Konfirmasi Pembayaran</span>
			@elseif($transaksi['status'] == 1)
			<span class="pull-right badge badge-success">Status: Sudah di Konfirmasi</span>
			@endif
			</h5>
		</div>
		<div class="card-body">
			<div class="col-md-12">
				<span class="pull-left">
					Invoice Code <b>#{{$kode_invoice}}</b>
				</span>
				<span class="pull-right">
					Total : Rp .<b>{{number_format($transaksi['total'])}}</b>
				</span>
			</div>
			<br>
			<hr>
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="datatables" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Gambar Produk</th>
								<th>Nama Produk</th>
								<th>Sub Total</th>
								<th>Biaya Design</th>
								<th>Jumlah Pembelian</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($transaksi)
							@foreach($transaksi['detailTransaksi'] as $data)
							<tr>
								<td>{{++$loop->index}}</td>
								<td>
									<img src="{{ $data['gambar_produk'] != null ? URL::to('upload/gambar-produk-pengguna/'.$data['gambar_produk']) : URL::to('upload/gambar-sendiri-pengguna/'.$data['gambar_sendiri']) }}" width="100" height="100" class="img-thumbnail">
								</td>
								<td>
									{{$data['nama_produk']}}
								</td>
								<td>Rp. {{number_format($data['subtotal'])}}</td>
								<td>{{$data['biaya_design'] ? 'Rp .'. number_format($data['biaya_design']) : 'tidak ada'}}</td>
								<td>{{$data['minimalPembelian']['jumlah_pembelian'] . ' / ' . $data['minimalPembelian']['satuan']}}</td>
								<td>
									<a href="#modal-detail" data-toggle="modal" class="btn btn-info btn-detail" data-kode_detail="{{$data['kode_detail']}}"><i class="fa fa-eye"></i> Detail Bahan Baku</a>
									@if($transaksi['gambar_bukti'] == null)
									<a href="#!" class="btn btn-delete btn-danger"
										{{count($transaksi['detailTransaksi']) == 1 ? 'data-count='.count($transaksi['detailTransaksi']).' data-kode_detail='.$kode_invoice .'' : 'data-count='.count($transaksi['detailTransaksi']).' data-kode_detail='.$data['kode_detail'] .''}}
									><i class="fa fa-trash"></i></a>
									@else
									@endif
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
					<hr>
					@if($transaksi && $transaksi['gambar_bukti'] == null)
					<div class="col-md-12">
						<a href="{{route('cart.pembayaran')}}" class="btn btn-success pull-right">Konfirmasi Pembayaran <i class="fa fa-credit-card"></i></a>
					</div>
					@elseif($transaksi['status'] == 1 && $transaksi['gambar_bukti'])
					<div class="col-md-12">
					</div>
					@endif
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Detail</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Bahan</th>
								<th>Jumlah/Berat</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody id="table-detail">
						</tbody>
					</table>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>Varian Rasa</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody id="varian_rasa">
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<tbody id="kemasan">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#datatables').on('click', '.btn-delete', function() {
		const kode_detail = $(this).data('kode_detail');
		const count = $(this).data('count');
		const bool = confirm('Apakah Anda yakin ingin menghapus barang ini ?');
		if (bool) {
			$.post('{{route('cart.delete')}}', {kode_detail: kode_detail,count: count}, function(data) {
				// console.log(data);
					location.reload();
				})
		}else {
			alert('Batal !');
		}
	});
	$('#datatables').on('click', '.btn-detail', function() {
		const kode_detail = $(this).data('kode_detail');
		$.get('{{route('cart.detail')}}', {kode_detail: kode_detail}, function(data) {
			// console.log(data);
			$('#table-detail').empty();
			$('#varian_rasa').empty();
			$.each(data, function(key, value) {
				$.each(value.sub_detail_transaksi, function(k, v) {
					const template1 = '<tr><td>'+(++k)+'</td><td>'+v.nama_bahan+'</td><td>'+v.jumlah+'</td><td>'+v.subtotal+'</td></tr>';
					$('#table-detail').append(template1);
				});
				$.each(value.trans_varian, function(s, v) {
					const template2 = '<tr><td>'+v.varian.nama_varian+'</td><td>'+v.jumlah+'</td></tr>';
					$('#varian_rasa').append(template2);
				})
				const template3 = '<tr><th>Ukuran Kemasan</th><td>'+value.kemasan.ukuran+'</td></tr><tr><th>Jumlah</th><td>'+value.minimal_pembelian.jumlah_pembelian+' / '+value.minimal_pembelian.satuan+'</td></tr>';
				$('#kemasan').append(template3);
			});
		});
	});
	@if(Session::has('success'))
		$(document).ready(function() {
			alert('{{Session::get('success')}}')
		})
	@endif
</script>
@endsection
@extends('home.templates.app2')
@section('content')
<div class="col-md-12 col-xs-12" style="margin-top: 150px">
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($transaksi)
							@foreach($transaksi['detailTransaksi'] as $data)
							<tr>
								<td>{{++$loop->index}}</td>
								<td>
									<img src="{{URL::to('upload/gambar-produk-pengguna/'.$data['gambar_produk'])}}" width="100" height="100" class="img-thumbnail">
								</td>
								<td>
									{{$data['nama_produk']}}
								</td>
								<td>Rp. {{number_format($data['subtotal'])}}</td>
								<td>{{$data['biaya_design'] ? 'Rp .'. number_format($data['biaya_design']) : 'tidak ada'}}</td>
								<td>
									<a href="#modal-detail" data-toggle="modal" class="btn btn-info btn-detail" data-kode_detail="{{$data['kode_detail']}}"><i class="fa fa-eye"></i> Detail</a>
									<a href="#!" class="btn btn-delete btn-danger"
										{{count($transaksi['detailTransaksi']) == 1 ? 'data-count='.count($transaksi['detailTransaksi']).' data-kode_detail='.$kode_invoice .'' : 'data-count='.count($transaksi['detailTransaksi']).' data-kode_detail='.$data['kode_detail'] .''}}
									><i class="fa fa-trash"></i></a>
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
					<table class="table table-hover">
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
			$('#table-detail').empty();
			$.each(data, function(key, value) {
				var template = '<tr><td>'+(++key)+'</td><td>'+value.nama_bahan+'</td><td>'+value.jumlah+'</td><td>'+value.subtotal+'</td></tr>';
				$('#table-detail').append(template);
			});
		});
	})
</script>
@endsection
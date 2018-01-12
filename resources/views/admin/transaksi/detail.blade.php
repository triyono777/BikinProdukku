@extends('admin.templates.app')
@section('customCss')
<link rel="stylesheet" type="text/css" href="{{URL::to('css/wizard.css')}}">
@endsection
@section('content')
<div class="col-md-12">
	<div class="box">
		<!-- title row -->
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-handshake-o"></i> Detail Transaksi
			<span class="pull-right">
				Tanggal : {{date('d/m/Y', strtotime($transaksi['tanggal']))}}
			</span>
			</h2>
		</div>
		<!-- /.col -->
		<!-- info row -->
		<div class="col-md-12">
			<span class="pull-right"><h3>Total: {{number_format($transaksi['total'])}}</h3></span>
		</div>
		<div class="invoice-info">
			<div class="col-sm-6 invoice-col">
				<h3><b>#{{$kode_invoice}}</b></h3>
			</div>
			<!-- /.col -->
			<div class="col-sm-6 invoice-col">
				<div class="pull-right">
					<span class="badge" id="badge-status">{{$transaksi['status'] == 0 ? 'Pending' : 'Success'}}</span>
					<a href="#modal-status" data-status="{{$transaksi['status']}}" data-toggle="modal" class="btn btn-warning btn-xs btn-status"><i class="fa fa-edit"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12 table-responsive">
					<table id="datatables" class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Nama Bahan</th>
								<th>Sub Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transaksi['detail_transaksi'] as $key => $value)
							<tr>
								<td>{{++$key}}</td>
								<td><img src="{{$value['gambar_produk']}}" class="img-thumbnail" width="100" height="80"></td>
								<td>{{$value['nama_produk']}}</td>
								<td>{{number_format($value['subtotal'])}}</td>
								<td>
									<a href="{{route('admin.transaksiSubDetailView', [$transaksi['kode_invoice'], $value['kode_detail']])}}" class="btn btn-info">Detail</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 20px">
				<!-- accepted payments column -->
				<div class="col-xs-4">
					<h3>Bukti Pembayaran</h3>
					<img src="http://via.placeholder.com/150x150" class="img-responsive" width="150px" height="150px">
				</div>
				<!-- /.col -->
				<div class="col-xs-8 col-md-8">
					<div class="pull-right">
						<h3>Tracking Transaksi
						<a href="#modal-tracking" data-toggle="modal" class="btn btn-xs btn-warning btn-tracking"
						data-pembelian_bahan_baku="{{$transaksi['tracking']['pembelian_bahan_baku']}}"
						data-cetak_kemasan="{{$transaksi['tracking']['cetak_kemasan']}}"
						data-produksi="{{$transaksi['tracking']['produksi']}}"
						data-qc="{{$transaksi['tracking']['qc']}}"
						data-finishing="{{$transaksi['tracking']['finishing']}}"
						data-pengiriman="{{$transaksi['tracking']['pengiriman']}}"
						><i class="fa fa-edit"></i></a>
						</h3>
					</div>
					<div class="clearfix"></div>
					<div class="wizard">
						<div class="wizard-inner">
							<div class="connecting-line"></div>
							<ul class="nav nav-tabs" role="tablist" id="list-tracking">
								<li id="pembelian_bahan_baku" class="{{$transaksi['tracking']['pembelian_bahan_baku'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step1" title="Pembelian Bahan Baku">
										<span class="round-tab">
											<i class="fa fa-cubes"></i>
										</span>
									</a>
								</li>
								<li id="cetak_kemasan" class="{{$transaksi['tracking']['cetak_kemasan'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step2" title="Cetak Kemasan">
										<span class="round-tab">
											<i class="fa fa-print"></i>
										</span>
									</a>
								</li>
								<li id="produksi" class="{{$transaksi['tracking']['produksi'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step3" title="Produksi">
										<span class="round-tab">
											<i class="fa fa-gears"></i>
										</span>
									</a>
								</li>
								<li id="qc" class="{{$transaksi['tracking']['qc'] == 1 ? 'active' : 'disabled'}}">
									<a href="#complete" title="Quality Control">
										<span class="round-tab">
											<i class="fa fa-search"></i>
										</span>
									</a>
								</li>
								<li id="finishing" class="{{$transaksi['tracking']['finishing'] == 1 ? 'active' : 'disabled'}}">
									<a href="#complete" title="Finishing">
										<span class="round-tab">
											<i class="fa fa-check"></i>
										</span>
									</a>
								</li>
								<li id="pengiriman" class="{{$transaksi['tracking']['pengiriman'] == 1 ? 'active' : 'disabled'}}">
									<a href="#complete" title="Pengiriman">
										<span class="round-tab">
											<i class="fa fa-truck"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
	</div>
</div>
{{-- modal status --}}
<div class="modal fade" id="modal-status">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="frm-status">
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="1">Success</option>
							<option value="0">Pending</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- modal tracking --}}
<div class="modal fade" id="modal-tracking">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="frm-tracking">
					<div class="form-group">
						<label>Status Tracking</label>
						<div class="row">
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="pembelian_bahan_baku" id="pembelian_bahan_baku">
										Pembelian Bahan Baku
									</label>
								</div>
							</div>
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="cetak_kemasan" id="cetak_kemasan">
										Cetak Kemasan
									</label>
								</div>
							</div>
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="produksi" id="produksi">
										Produksi
									</label>
								</div>
							</div>
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="qc" id="qc">
										QC
									</label>
								</div>
							</div>
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="finishing" id="finishing">
										Finishing
									</label>
								</div>
							</div>
							<div class="col-lg-2 col-xs-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="1" name="pengiriman" id="pengiriman">
										Pengiriman
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('.btn-status').on('click', function() {
		const status = $(this).data('status');
		$('#modal-status').find('#status').val(status).change();
	});
	$('.btn-tracking').on('click', function() {
		const pembelian_bahan_baku = $(this).data('pembelian_bahan_baku');
		const cetak_kemasan = $(this).data('cetak_kemasan');
		const produksi = $(this).data('produksi');
		const qc = $(this).data('qc');
		const finishing = $(this).data('finishing');
		const pengiriman = $(this).data('pengiriman');

		pembelian_bahan_baku == 1 ? $('#modal-tracking').find('#pembelian_bahan_baku').attr('checked', true) : $('#modal-tracking').find('#pembelian_bahan_baku').attr('checked', false);
		cetak_kemasan == 1 ? $('#modal-tracking').find('#cetak_kemasan').attr('checked', true) : $('#modal-tracking').find('#cetak_kemasan').attr('checked', false);
		produksi == 1 ? $('#modal-tracking').find('#produksi').attr('checked', true) : $('#modal-tracking').find('#produksi').attr('checked', false);
		qc == 1 ? $('#modal-tracking').find('#qc').attr('checked', true) : $('#modal-tracking').find('#qc').attr('checked', false);
		finishing == 1 ? $('#modal-tracking').find('#finishing').attr('checked', true) : $('#modal-tracking').find('#finishing').attr('checked', false);
		pengiriman == 1 ? $('#modal-tracking').find('#pengiriman').attr('checked', true) : $('#modal-tracking').find('#pengiriman').attr('checked', false);
	});

	$('#frm-status').on('submit', function(e) {
		e.preventDefault();
		const status = $(this).serialize();
		$.post("{{route('admin.transaksiStatusUpdate', $transaksi['kode_invoice'])}}", status, function(data) {
			data == 1 ? $('#badge-status').text('Success') : $('#badge-status').text('Pending');
			$('#modal-status').modal('hide');
		})
	});

	$('#frm-tracking').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('admin.transaksiTrackingUpdate', $transaksi['kode_invoice'])}}", data, function(data) {
			data.pembelian_bahan_baku == 1 ? $('#list-tracking').find('#pembelian_bahan_baku').addClass('active') : $('#list-tracking').find('#pembelian_bahan_baku').removeClass('active');
			data.cetak_kemasan == 1 ? $('#list-tracking').find('#cetak_kemasan').addClass('active') : $('#list-tracking').find('#cetak_kemasan').removeClass('active');
			data.produksi == 1 ? $('#list-tracking').find('#produksi').addClass('active') : $('#list-tracking').find('#produksi').removeClass('active');
			data.qc == 1 ? $('#list-tracking').find('#qc').addClass('active') : $('#list-tracking').find('#qc').removeClass('active');
			data.finishing == 1 ? $('#list-tracking').find('#finishing').addClass('active') : $('#list-tracking').find('#finishing').removeClass('active');
			data.pengiriman == 1 ? $('#list-tracking').find('#pengiriman').addClass('active') : $('#list-tracking').find('#pengiriman').removeClass('active');
			$('#modal-tracking').modal('hide');

		})
	})
</script>
@endsection
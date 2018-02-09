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
				Tanggal : {{date('d/m/Y', strtotime($pengguna['tanggal']))}}
			</span>
			</h2>
		</div>
		<!-- /.col -->
		<!-- info row -->
		<div class="col-md-12">
			<span class="pull-right"><h3>Total: Rp .{{number_format($pengguna['total'])}}</h3></span>
		</div>
		<div class="invoice-info">
			<div class="col-sm-6 invoice-col">
				<h3><b>#{{$pengguna['kode_invoice']}}</b></h3>
			</div>
			<!-- /.col -->
			<div class="col-sm-6 invoice-col">
				<div class="pull-right">
					<span class="badge" id="badge-status">{{$pengguna['status'] == 0 ? 'Pending' : 'Finished'}}</span>
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
							@foreach($pengguna['detail_transaksi'] as $key => $value)
							<tr>
								<td>{{++$key}}</td>
								<td>
									<a href="{{$value['gambar_produk'] != null ? URL::to('upload/gambar-produk-pengguna/'.$value['gambar_produk']) : URL::to('upload/gambar-sendiri-pengguna/'.$value['gambar_sendiri'])}}">
									<img src="{{ $value['gambar_produk'] != null ? URL::to('upload/gambar-produk-pengguna/'.$value['gambar_produk']) : URL::to('upload/gambar-sendiri-pengguna/'.$value['gambar_sendiri']) }}" class="img-thumbnail" width="100" height="80">
									</a>
								</td>
								<td>{{$value['nama_produk']}}</td>
								<td>{{number_format($value['subtotal'])}}</td>
								<td>
									<a href="{{route('akun.penggunaSubTransaksiDetailView', [$kode_invoice, $value['kode_detail']])}}" class="btn btn-info">Detail</a>
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
					@if($pengguna['gambar_bukti'] == null)
						<span class="badge">Belum upload bukti pembayaran</span>
					@else
					<a href="{{URL::to('upload/bukti_pembayaran/'.$pengguna['gambar_bukti'])}}">
					<img src="{{URL::to('upload/bukti_pembayaran/'.$pengguna['gambar_bukti'])}}" class="img-responsive" width="150px" height="150px">
					</a>
					@endif
				</div>
				<!-- /.col -->
				<div class="col-xs-8 col-md-8">
					<div class="pull-right">
						<h3>Tracking Transaksi
						</h3>
					</div>
					<div class="clearfix"></div>
					<div class="wizard">
						<div class="wizard-inner">
							<div class="connecting-line"></div>
							<ul class="nav nav-tabs" role="tablist" id="list-tracking">
								<li id="pembelian_bahan_baku" class="{{$pengguna['tracking']['pembelian_bahan_baku'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step1" title="Pembelian Bahan Baku">
										<span class="round-tab">
											<i class="fa fa-cubes"></i>
										</span>
									</a>
								</li>
								<li id="cetak_kemasan" class="{{$pengguna['tracking']['cetak_kemasan'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step2" title="Cetak Kemasan">
										<span class="round-tab">
											<i class="fa fa-print"></i>
										</span>
									</a>
								</li>
								<li id="produksi" class="{{$pengguna['tracking']['produksi'] == 1 ? 'active' : 'disabled'}}">
									<a href="#step3" title="Produksi">
										<span class="round-tab">
											<i class="fa fa-gears"></i>
										</span>
									</a>
								</li>
								<li id="qc" class="{{$pengguna['tracking']['qc'] == 1 ? 'active' : 'disabled'}}">
									<a href="#complete" title="Quality Control">
										<span class="round-tab">
											<i class="fa fa-search"></i>
										</span>
									</a>
								</li>
								<li id="finishing" class="{{$pengguna['tracking']['finishing'] == 1 ? 'active' : 'disabled'}}">
									<a href="#complete" title="Finishing">
										<span class="round-tab">
											<i class="fa fa-check"></i>
										</span>
									</a>
								</li>
								<li id="pengiriman" class="{{$pengguna['tracking']['pengiriman'] == 1 ? 'active' : 'disabled'}}">
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
@endsection
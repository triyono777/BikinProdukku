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
				Tanggal : {{date('d/m/Y')}}
			</span>
			</h2>
		</div>
		<!-- /.col -->
		<!-- info row -->
		<div class="col-md-12">
			<span class="pull-right"><h3>Total: 30.000</h3></span>
		</div>
		<div class="invoice-info">
			<div class="col-sm-6 invoice-col">
				<h3><b>#INV736332</b></h3>
			</div>
			<!-- /.col -->
			<div class="col-sm-6 invoice-col">
				<div class="pull-right">
					<span class="badge">Pending</span>
					<a href="#!" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
				</div>
			</div>
		</div>
		<!-- /.row -->
		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Bahan</th>
								<th>Jumlah</th>
								<th>Sub Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Call of Duty</td>
								<td>455-981-221</td>
								<td>El snort testosterone trophy driving gloves handsome</td>
								<td>
									<a href="{{route('admin.transaksiSubDetailView', [1, 2])}}" class="btn btn-info">Detail</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Need for Speed IV</td>
								<td>247-925-726</td>
								<td>Wes Anderson umami biodiesel</td>
								<td>
									<a href="{{route('admin.transaksiSubDetailView', [1, 2])}}" class="btn btn-info">Detail</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Monsters DVD</td>
								<td>735-845-642</td>
								<td>Terry Richardson helvetica tousled street art master</td>
								<td>
									<a href="{{route('admin.transaksiSubDetailView', [1, 2])}}" class="btn btn-info">Detail</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Grown Ups Blue Ray</td>
								<td>422-568-642</td>
								<td>Tousled lomo letterpress</td>
								<td>
									<a href="{{route('admin.transaksiSubDetailView', [1, 2])}}" class="btn btn-info">Detail</a>
								</td>
							</tr>
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
				<div class="col-xs-8">
					<div class="pull-right">
						<h3>Tracking Transaksi <a href="#!" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a></h3>
					</div>
					<div class="wizard">
						<div class="wizard-inner">
							<div class="connecting-line"></div>
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
										<span class="round-tab">
											<i class="glyphicon glyphicon-folder-open"></i>
										</span>
									</a>
								</li>
								<li role="presentation" class="disabled">
									<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
										<span class="round-tab">
											<i class="glyphicon glyphicon-pencil"></i>
										</span>
									</a>
								</li>
								<li role="presentation" class="disabled">
									<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
										<span class="round-tab">
											<i class="glyphicon glyphicon-picture"></i>
										</span>
									</a>
								</li>
								<li role="presentation" class="disabled">
									<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
										<span class="round-tab">
											<i class="glyphicon glyphicon-ok"></i>
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
	@endsection
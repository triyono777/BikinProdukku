@extends('home.templates.app2')
@section('content')
<div class="col-md-12 col-xs-12" style="margin-top: 150px">
	<div class="card">
		<div class="card-header">
			<h5>Keranjang Belanja <i class="fa fa-shopping-cart"></i></h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="datatables" class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Transaksi</th>
							<th>Tanggal Transaksi</th>
							<th>Status</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transaksi as $data)
						<tr>
							<td>{{++$loop->index}}</td>
							<td>{{$data['kode_invoice']}}</td>
							<td>{{date('d-F-Y', strtotime($data['tanggal']))}}</td>
							<td><span class="badge badge-{{$data['status'] == 0 ? 'danger' : 'success'}}">{{$data['status'] == 0 ? 'Belum Terbayar' : 'Sudah Terbayar'}}</span></td>
							<td>Rp. {{number_format($data['total'])}}</td>
							<td>
								<a href="#!" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
								<a href="#!" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
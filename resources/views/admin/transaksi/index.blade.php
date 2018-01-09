@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Transaksi</h3>
		</div>
		<div class="box-body">
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Invoice</th>
							<th>Pengguna</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>#INV3213123</td>
							<td>adam</td>
							<td>
								<span class="btn btn-success btn-xs">Yes</span>
							</td>
							<td>
								<a href="{{route('admin.transaksiDetailView', 1)}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
								<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						<tr>
							<td>1</td>
							<td>#INV3213123</td>
							<td>adam</td>
							<td>
								<span class="btn btn-success btn-xs">Yes</span>
							</td>
							<td>
								<a href="{{route('admin.transaksiDetailView', 1)}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
								<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						<tr>
							<td>1</td>
							<td>#INV3213123</td>
							<td>adam</td>
							<td>
								<span class="btn btn-success btn-xs">Yes</span>
							</td>
							<td>
								<a href="{{route('admin.transaksiDetailView', 1)}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
								<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
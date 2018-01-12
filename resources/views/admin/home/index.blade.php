@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Notifikasi Transaksi</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table id="datatables" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Notifikasi</th>
									<th>Action</th>
								</tr>
							</thead>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#datatables').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{route('admin.landingPageData')}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'notifikasi'},
	            {data: 'action'},
	        ]
	 });
</script>
@endsection
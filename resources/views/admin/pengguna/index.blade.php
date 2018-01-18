@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h4 class="page-header">
			Data Transaksi
			</h4>
		</div>
		<div class="box-body">
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Invoice</th>
							<th>Tgl</th>
							<th>Total Pembayaran</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
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
	        ajax: '/akun/{{auth()->guard('pengguna')->user()->username}}&id={{auth()->guard('pengguna')->user()->id_user}}/transaksi-data',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'kode_invoice'},
	            {data: 'tanggal'},
	            {data: 'total'},
	            {data: 'status'},
	            {data: 'action'},
	        ]
	    });
	   </script>
@endsection
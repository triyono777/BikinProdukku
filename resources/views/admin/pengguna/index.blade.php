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
			<div class="col-md-8 col-xs-12 col-md-offset-2">
					<h4 style="text-align: center;">Masukkan Kode Invoice untuk mencari data transaksi anda</h4>
					<div class="col-md-12 col-xs-12">
						<div class="form-group">
							<input type="text" name="cari" id="cari" class="form-control">
						</div>
					</div>
			</div>
			<div class="col-md-12 col-xs-12">
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
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	var oTable = $('#datatables').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/akun/transaksi-data',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'kode_invoice'},
			{data: 'tanggal'},
			{data: 'total'},
			{data: 'status'},
			{data: 'action'},
		]
	});
	$('#cari').on('change',function(){
	      oTable.search($(this).val()).draw() ;
	})
</script>
@endsection
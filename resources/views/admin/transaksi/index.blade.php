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
				</table>
			</div>
		</div>
	</div>
</div>

{{-- modal edit --}}
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="" id="frm-edit" method="post">
					<div class="form-group">
						<label>Kode Invoice</label>
						<input type="text" name="kode_invoice" id="kode_invoice" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>User</label>
						<input type="text" name="id_user" id="id_user" class="form-control" readonly="">
					</div>
					<div class="form-group">
						<label>Tanggal Transaksi</label>
						<input type="text" name="tanggal" id="tanggal" class="form-control datepicker">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="1">Yes</option>
							<option value="0">No</option>
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
@endsection
@section('customJs')
	<script type="text/javascript">
		$('#datatables').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{route('admin.transaksiData')}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'kode_invoice'},
	            {data: 'pengguna'},
	            {data: 'status'},
	            {data: 'action'},
	        ]
	    });

	    $('#datatables').on('click', '.edit', function() {
			const kode_invoice = $(this).data('kode_invoice');
			const id_user = $(this).data('id_user');
			const tanggal = $(this).data('tanggal');
			const status = $(this).data('status');

			$('#modal-edit').find('#kode_invoice').val(kode_invoice);
			$('#modal-edit').find('#id_user').val(id_user);
			$('#modal-edit').find('#tanggal').val(tanggal);
			$('#modal-edit').find('#status').val(status);
		});

		$('#frm-edit').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post("{{route('admin.transaksiUpdate')}}", data, function() {
				$('#modal-edit').modal('hide');
				$('#datatables').DataTable().ajax.reload();
				alertify.success('data berhasil di update');
			})
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
				 	$.post('{{route('admin.transaksiDelete')}}', {id: id}, function() {
				 		$('#datatables').DataTable().ajax.reload();
				 		alertify.success('Data berhasil di hapus !');
				 	})
				 },
				 function() {
				 	alertify.error('Cancel')
				 });
		})
	</script>
@endsection
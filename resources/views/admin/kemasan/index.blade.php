@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Kemasan</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Kemasan <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form method="post" id="frm-tambah">
					<div class="form-group">
						<label for="">Ukuran Kemasan</label>
						<input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="14 X 20 cm">
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="number" min="0" name="harga" id="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select name="status" id="status" class="form-control">
							<option selected="" disabled="">-Status-</option>
							<option value="1">Tersedia</option>
							<option value="0">Tidak Tersedia</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Tambah</button>
			    </form>
			  </div>
			</div>
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Ukuran</th>
							<th>Harga</th>
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
						<label for="">Ukuran Kemasan</label>
						<input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="14 X 20 cm">
						<input type="hidden" name="id" id="id">
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="number" min="0" name="harga" id="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Status</label>
						<select name="status" class="form-control" id="status">
							<option selected="" disabled="">-Status-</option>
							<option value="1">Tersedia</option>
							<option value="0">Tidak Tersedia</option>
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
	        ajax: '{{route('admin.kemasanData')}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'ukuran'},
	            {data: 'harga'},
	            {data: 'status'},
	            {data: 'action'},
	        ]
	    });

		$('#frm-tambah').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post('{{route('admin.kemasanPost')}}', data, function(data) {
				$('#frm-tambah')[0].reset();
				 $('#datatables').DataTable().ajax.reload();
				 alertify.success('data berhasil di tambah');
			});
		})

		$('#datatables').on('click', '.edit', function() {
			const id = $(this).data('id');
			const ukuran = $(this).data('ukuran');
			const harga = $(this).data('harga');
			const status = $(this).data('status');

			$('#modal-edit').find('#id').val(id);
			$('#modal-edit').find('#ukuran').val(ukuran);
			$('#modal-edit').find('#harga').val(harga);
			$('#modal-edit').find('#status').val(status).change();
		});

		$('#frm-edit').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post("{{route('admin.kemasanUpdate')}}", data, function(data) {
				$('#modal-edit').modal('hide');
				$('#datatables').DataTable().ajax.reload();
				alertify.success('data berhasil di update');
			});
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
				 	$.post('{{route('admin.kemasanDelete')}}', {id: id}, function() {
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
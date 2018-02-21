@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Varian Rasa</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Varian Rasa <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form method="post" id="frm-tambah">
					<div class="form-group">
						<label for="">Nama varian rasa</label>
						<input type="text" name="nama_varian" class="form-control">
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
							<th>Nama Varian</th>
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
						<label for="">Nama varian rasa</label>
						<input type="text" name="nama_varian" id="nama_varian" class="form-control">
						<input type="hidden" name="id" id="id">
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
	        ajax: '{{route('admin.varianRasaData')}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'nama_varian'},
	            {data: 'action'},
	        ]
	    });

		$('#frm-tambah').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post('{{route('admin.varianRasaPost')}}', data, function(data) {
				$('#frm-tambah')[0].reset();
				 $('#datatables').DataTable().ajax.reload();
				 alertify.success('data berhasil di tambah');
			});
		})

		$('#datatables').on('click', '.edit', function() {
			const id = $(this).data('id');
			const nama_varian = $(this).data('nama_varian');
			$('#modal-edit').find('#nama_varian').val(nama_varian);
			$('#modal-edit').find('#id').val(id);
		});

		$('#frm-edit').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post("{{route('admin.varianRasaUpdate')}}", data, function() {
				$('#modal-edit').modal('hide');
				$('#datatables').DataTable().ajax.reload();
				alertify.success('data berhasil di update');
			})
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
				 	$.post('{{route('admin.varianRasaDelete')}}', {id: id}, function() {
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
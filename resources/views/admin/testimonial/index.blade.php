@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Testimonial</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Testimonial <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="{{route('admin.testimonialPost')}}" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	{{csrf_field()}}
					<div class="form-group">
						<label for="">Nama Testimonial</label>
						<select class="form-control select2" id="id_user" style="width: 100% !important" name="id_user">
							<option disabled="" selected="">-Pilih-</option>
							@foreach($pengguna as $data)
								<option value="{{$data['id_user']}}">{{$data['nama']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Upload Gambar</label>
						<input type="file" name="gambar" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Isi Testimonial</label>
						<textarea class="textarea form-control" name="testimonial"></textarea>
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
							<th>Gambar</th>
							<th>Nama Testimonial</th>
							<th>Isi Testimonial</th>
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.testimonialUpdate')}}" id="frm-edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label>Testimonial</label>
						<textarea class="form-control textarea" name="testimonial" id="testimonial"></textarea>
						<input type="hidden" name="id" id="id">
					</div>
					<div class="form-group">
						<label>Upload Gambar</label>
						<input type="file" name="gambar" class="form-control">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="1">Terkonfirmasi</option>
							<option value="0">Belum Terkonfirmasi</option>
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
	        ajax: '{{route('admin.testimonialData')}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'gambar'},
	            {data: 'id_user'},
	            {data: 'testimonial'},
	            {data: 'status'},
	            {data: 'action'},
	        ]
	    });

		// $('#frm-tambah').on('submit', function(e) {
		// 	e.preventDefault();
		// 	const data = $(this).serialize();
		// 	$.post('{{route('admin.testimonialPost')}}', data, function(data) {
		// 		$('#frm-tambah')[0].reset();
		// 		 $('#datatables').DataTable().ajax.reload();
		// 		 alertify.success('data berhasil di tambah');
		// 	});
		// })

		$('#datatables').on('click', '.edit', function() {
			const id = $(this).data('id');
			const id_user = $(this).data('id_user');
			const testimonial = $(this).data('testimonial');
			const status = $(this).data('status');

			$('#modal-edit').find('#id').val(id);
			$('#modal-edit').find('#id_user').val(id_user);
			$('#modal-edit').find('#status').val(status).change();
			$('iframe').contents().find('.textarea').html(testimonial);

		});

		// $('#frm-edit').on('submit', function(e) {
		// 	e.preventDefault();
		// 	const data = $(this).serialize();
		// 	$.post("{{route('admin.testimonialUpdate')}}", data, function() {
		// 		$('#modal-edit').modal('hide');
		// 		$('#datatables').DataTable().ajax.reload();
		// 		alertify.success('data berhasil di update');
		// 	})
		// });

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
				 	$.post('{{route('admin.testimonialDelete')}}', {id: id}, function() {
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
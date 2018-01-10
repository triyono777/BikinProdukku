@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Dialog Proses</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Dialog Proses <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="{{route('admin.dialogProsesPost')}}" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	{{csrf_field()}}
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" name="gambar" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea class="form-control textarea" name="keterangan"></textarea>
					</div>
					<button class="btn btn-primary">Tambah</button>
			    </form>
			  </div>
			</div>
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($dialogProses as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>
								<img src="{{URL::to('upload/dialog-proses/'.$value['gambar'])}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>
								{{ substr(strip_tags($value['keterangan']), 0, 100) }}{{strlen($value['keterangan']) > 100 ? '...' : ' '}}
							</td>
							<td>
								<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
								data-id="{{$value['id_dialog']}}"
								data-keterangan="{{$value['keterangan']}}"
								><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger delete"
								data-id="{{$value['id_dialog']}}"
								><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{{-- modal edit Dialog Proses--}}
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.dialogProsesUpdate')}}" id="frm-edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Upload Gambar Baru</label>
						<input type="file" name="gambar" id="gambar" class="form-control">
						<input type="hidden" name="id" id="id">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="keterangan" id="keterangan" class="form-control textarea" rows="3"></textarea>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#datatables').on('click', '.edit', function() {
		const id = $(this).data('id');
		const keterangan = $(this).data('keterangan');
		// console.log(id,keterangan)
		$("#modal-edit").find('#id').val(id);
		$('iframe').contents().find('.textarea').html(keterangan);
	});
	$('#datatables').on('click', '.delete', function() {
		const id = $(this).data('id');
		alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
			function() {
				$.post('{{route('admin.dialogProsesDelete')}}', {id: id}, function() {
					alertify.success('Data berhasil di hapus !');
					location.reload();
				})
			},
			function() {
				alertify.error('Cancel')
			});
	});
</script>
@endsection
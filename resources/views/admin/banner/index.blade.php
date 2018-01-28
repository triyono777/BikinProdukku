@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Banner</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Banner <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="{{route('admin.bannerPost')}}" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
						<label for="">Tipe</label>
						<select class="form-control" name="tipe" id="tipe">
							<option selected="" value="gambar">Gambar</option>
							<option value="video">Video</option>
						</select>
					</div>

					<div class="form-group" id="form-group-tipe">
						<label for="">Upload Gambar</label>
						<input type="file" name="gambar" id="file" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Tipe Page</label>
						<input type="text" name="tipe_page" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea class="form-control textarea" name="keterangan"></textarea>
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
							<th>Gambar/Link Video</th>
							<th>Keterangan</th>
							<th>Tipe</th>
							<th>Tipe Page</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($banner as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>
								@if($value['tipe'] == 'gambar')
									<img src="{{URL::to('upload/banner/'.$value['gambar'])}}" class="img-thumbnail" width="100" height="80">
								@else
									<a href="{{$value['gambar']}}">{{$value['gambar']}}</a>
								@endif
							</td>
							<td>{{ substr(strip_tags($value['keterangan']), 0, 100) }}{{strlen($value['keterangan']) > 100 ? '...' : ' '}}</td>
							<td>{{$value['tipe']}}</td>
							<td>{{$value['tipe_page']}}</td>
							<td>
								<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
								data-id="{{$value['id_banner']}}"
								data-keterangan="{{$value['keterangan']}}"
								data-tipe="{{$value['tipe']}}"
								data-tipe_page="{{$value['tipe_page']}}"
								><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger delete"
								data-id="{{$value['id_banner']}}"
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

{{-- modal edit gambar Produk--}}
<div class="modal fade" id="modal-edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.bannerUpdate')}}" id="frm-edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Tipe</label>
						<select class="form-control" name="tipe" id="tipe-edit">
							<option value="gambar">Gambar</option>
							<option value="video">Video</option>
						</select>
					</div>
					<div class="form-group" id="form-group-tipe-edit">

					</div>
					<div class="form-group">
						<label for="">Tipe Page</label>
						<input type="text" name="tipe_page" id="tipe_page" class="form-control">
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

		$('#tipe').on('change', function(){
			var upload = '<label for="">Upload Gambar</label>'+
						'<input type="file" name="gambar" id="file" class="form-control">';

			var link = '<label for="">link</label>'+
						'<input type="text" name="gambar" id="link" class="form-control">';

			if( $(this).val() != 'gambar' ){
				$('#form-group-tipe').empty();
				$('#form-group-tipe').append(link);
			}else{
				$('#form-group-tipe').empty();
				$('#form-group-tipe').append(upload);
			}
		});

		$('#modal-edit').on('change', '#tipe-edit',function(){
			var upload = '<label for="">Upload Gambar</label>'+
						'<input type="file" name="gambar" id="file" class="form-control">';

			var link = '<label for="">link</label>'+
						'<input type="text" name="gambar" id="link" class="form-control">';

			if( $(this).val() != 'gambar' ){
				$('#form-group-tipe-edit').empty();
				$('#form-group-tipe-edit').append(link);
			}else{
				$('#form-group-tipe-edit').empty();
				$('#form-group-tipe-edit').append(upload);
			}
		});

		$('#datatables').on('click', '.edit', function() {
			const id = $(this).data('id');
			const keterangan = $(this).data('keterangan');
			const tipe = $(this).data('tipe');
			const tipe_page = $(this).data('tipe_page');
			var upload = '<label for="">Upload Gambar</label>'+
						'<input type="file" name="gambar" id="file" class="form-control">';
			var link = '<label for="">link</label>'+
						'<input type="text" name="gambar" id="link" class="form-control">';

			if (tipe == 'gambar') {
				$('#tipe-edit').val(tipe).change();
				$('#form-group-tipe-edit').empty();
				$('#form-group-tipe-edit').append(upload);
			}else {
				$('#tipe-edit').val(tipe).change();
				$('#form-group-tipe-edit').empty();
				$('#form-group-tipe-edit').append(link);
			}

			$('#modal-edit').find('#id').val(id);
			$('#modal-edit').find('#tipe').val(tipe);
			$('#modal-edit').find('#tipe_page').val(tipe_page);
			$('iframe').contents().find('.textarea').html(keterangan);
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				function() {
					$.post('{{route('admin.bannerDelete')}}', {id: id}, function() {
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
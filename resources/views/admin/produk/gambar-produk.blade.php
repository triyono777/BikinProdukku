@extends('admin.templates.app')

@section('content')
{{-- Gambar Template --}}
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Gambar Template</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah2" aria-expanded="false" aria-controls="collapse-tambah2">
			  Tambah Gambar Template <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah2" style="margin-top: 10px">
			  <div class="well">
			    <form action="{{route('admin.gambarTemplatePost', [$kode_produk, $id_gambar])}}" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
						<label for="">Upload Gambar</label>
						<input type="file" name="gambar_template" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" id="harga" class="form-control">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="sold_out">
								Sold Out
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea name="caption" class="form-control textarea" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Tambah</button>
			    </form>
			  </div>
			</div>
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar Template</th>
							<th>Caption</th>
							<th>Harga</th>
							<th>Sold Out</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambarTemplate as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>
								<img src="{{URL::to('upload/gambar-template/'. $value['gambar_template'])}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>{{'Rp. '.number_format($value['harga'])}}</td>
							<td>{{strip_tags($value['caption'])}}</td>
							<td><span class="btn btn-xs {{$value['sold_out'] == 1 ? 'btn-success' : 'btn-danger' }}">{{$value['sold_out'] == 1 ? 'Yes' : 'No' }}</span></td>
							<td>
								<a href="{{route('admin.gambarTemplateDetail', [$kode_produk, $id_gambar, $value['kode_template']])}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
								<a href="#modal-edit2" data-toggle="modal" class="btn btn-warning edit"
								data-id="{{$value['kode_template']}}"
								data-sold_out="{{$value['sold_out']}}"
								data-caption="{{$value['caption']}}"
								><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger delete" data-id="{{$value['kode_template']}}"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

{{-- modal edit gambar Template--}}
<div class="modal fade" id="modal-edit2">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.gambarTemplateUpdate', [$kode_produk, $id_gambar])}}" id="frm-edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Upload Gambar Baru</label>
						<input type="file" name="gambar_template" id="gambar_template" class="form-control">
						<input type="hidden" name="id" id="id">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" id="sold_out" name="sold_out">
								Sold Out
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea name="caption" id="caption" class="form-control textarea" rows="3"></textarea>
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


	$('#datatables2').on('click', '.edit', function() {
		const id = $(this).data('id');
		const sold_out = $(this).data('sold_out');
		const caption = $(this).data('caption');

		$('#modal-edit2').find('#id').val(id);
		if (sold_out == 1) {
			$('#modal-edit2').find('#sold_out').prop('checked', true);
		}else {
			$('#modal-edit2').find('#sold_out').prop('checked', false);
		}
		$('iframe').contents().find('.textarea').html(caption);
	});

	$('#datatables2').on('click', '.delete', function() {
		const id = $(this).data('id');
		alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
			function() {
				$.post('{{route('admin.gambarTemplateDelete', [$kode_produk, $id_gambar])}}', {id: id}, function() {
					alertify.success('Data berhasil di hapus !');
					location.reload();
				})
			},
			function() {
				alertify.error('Cancel')
			});
	})

	$('#datatables2').DataTable();
</script>
@endsection
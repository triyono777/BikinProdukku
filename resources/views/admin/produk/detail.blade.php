@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Gambar Produk</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
				Tambah Gambar Produk <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
				<div class="well">
					<form action="{{route('admin.gambarProdukPost', $kode_produk)}}" method="post" id="frm-tambah" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Upload Gambar</label>
							<input type="file" name="gambar_tampilan" class="form-control">
							<input type="hidden" name="id" id="id">
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
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar Produk</th>
							<th>
								Caption
							</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambarProduk as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>
								<img src="{{URL::to('upload/gambar-produk/'.$value['gambar_tampilan'])}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>{{ substr(strip_tags($value['caption']), 0, 100) }}{{strlen($value['caption']) > 100 ? '...' : ' '}}</td>
							<td>
								<a href="{{route('admin.gambarProdukView', [$kode_produk, $value['kode_gambar']])}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
								<a href="#modal-edit" class="btn btn-warning edit" data-toggle="modal" data-caption="{{$value['caption']}}" data-id="{{$value['kode_gambar']}}"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger delete" data-id="{{$value['kode_gambar']}}"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
{{-- Bahan Baku --}}
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Bahan Baku Produk</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah2" aria-expanded="false" aria-controls="collapse-tambah2">
				Tambah Bahan Baku <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah2" style="margin-top: 10px">
				<div class="well">
					<form action="" method="post" id="frm-tambah2">
						<div class="form-group">
							<label for="">Nama Bahan</label>
							<input type="text" name="nama_bahan" class="form-control">
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
							<th>Nama Bahan</th>
							<th>Caption</th>
							<th>Action</th>
						</tr>
					</thead>
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
				<form action="{{route('admin.gambarProdukUpdate', $kode_produk)}}" id="frm-edit" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Upload Gambar Baru</label>
						<input type="file" name="gambar_tampilan" id="gambar_tampilan" class="form-control">
						<input type="hidden" name="id" id="id">
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
{{-- modal edit bahan baku--}}
<div class="modal fade" id="modal-edit2">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<form action="" id="frm-edit2" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Nama Bahan</label>
						<input type="text" name="nama_bahan" class="form-control" id="nama_bahan">
						<input type="hidden" name="id" id="id">
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
	$('#datatables').on('click', '.edit', function() {
		const id = $(this).data('id');
		const caption = $(this).data('caption');
		$('#modal-edit').find('#id').val(id);
		$('iframe').contents().find('.textarea').html(caption);
	});
	$('#datatables').on('click', '.delete', function() {
		const id = $(this).data('id');
		alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
			function() {
				$.post('{{route('admin.gambarProdukDelete', $kode_produk)}}', {id: id}, function() {
					alertify.success('Data berhasil di hapus !');
					location.reload();
				})
			},
			function() {
				alertify.error('Cancel')
			});
	});
	// bahan baku
	$('#datatables2').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{route('admin.bahanBakuData', $kode_produk)}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'nama_bahan'},
			{data: 'caption'},
			{data: 'action'},
		]
	});
	$('#frm-tambah2').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post('{{route('admin.bahanBakuPost', $kode_produk)}}', data, function(data) {
					$('#frm-tambah2')[0].reset();
					 $('#datatables2').DataTable().ajax.reload();
					 alertify.success('data berhasil di tambah');
			});
	})
	$('#datatables2').on('click', '.edit', function() {
		const id = $(this).data('id');
		const nama_bahan = $(this).data('nama');
		const caption = $(this).data('caption');

		$('#modal-edit2').find('#id').val(id);
		$('#modal-edit2').find('#nama_bahan').val(nama_bahan);
		$('iframe').contents().find('.textarea').html(caption);
	});
	$('#frm-edit2').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('admin.bahanBakuUpdate', $kode_produk)}}", data, function() {
			$('#modal-edit2').modal('hide');
			$('#datatables2').DataTable().ajax.reload();
			alertify.success('data berhasil di update');
		})
	});
	$('#datatables2').on('click', '.delete', function() {
		const id = $(this).data('id');
		alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
					 	$.post('{{route('admin.bahanBakuDelete', $kode_produk)}}', {id: id}, function() {
						 		$('#datatables2').DataTable().ajax.reload();
						 		alertify.success('Data berhasil di hapus !');
					 	})
				 },
				 function() {
					 	alertify.error('Cancel')
				 });
	})
</script>
@endsection
@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Gambar Warna</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Gambar Warna <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="{{route('admin.gambarWarnaPost', [$kode_produk, $id_gambar])}}" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	{{csrf_field()}}
					<div class="form-group">
						<label for="">Upload Gambar</label>
						<input type="file" name="gambar_warna" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea name="caption" class="form-control textarea" rows="3"></textarea>
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
							<th>Gambar Warna</th>
							<th>
								Caption
							</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambarWarna as $key => $value)
						<tr>
							<td>{{++$key}}</td>
							<td>
								<img src="{{URL::to('upload/gambar-warna/'. $value['gambar_warna'])}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>{{strip_tags($value['caption'])}}</td>
							<td>
								<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

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
			    <form action="" method="post" id="frm-tambah" enctype="multipart/form-data">
			    	<div class="form-group">
						<label for="">Upload Gambar</label>
						<input type="file" name="gambar_template" class="form-control">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" name="sold_out">
								Sold Out
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea name="caption" class="form-control textarea" rows="3"></textarea>
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
							<th>Gambar Template</th>
							<th>Caption</th>
							<th>Sold Out</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>
								<img src="{{URL::to('dist/img/avatar2.png')}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</td>
							<td>
								<span class="btn btn-success btn-xs">Yes</span>
							</td>
							<td>
								<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
								<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#datatables').on('click', '.edit', function() {
		const id = $(this).data('id');
		const id_kategori = $(this).data('id_kategori');
		const nama_produk = $(this).data('nama_produk');
		const biaya_operasional = $(this).data('biaya_operasional');
		const sold_out = $(this).data('sold_out');
		const perbesar = $(this).data('perbesar');
		const caption = $(this).data('caption');
		$('#modal-edit').find('#id').val(id);
		$('#modal-edit').find('#id_kategori').val(id_kategori).change();
		$('#modal-edit').find('#nama_produk').val(nama_produk);
		$('#modal-edit').find('#biaya_operasional').val(biaya_operasional);
		if (sold_out == 1) {
			$('#modal-edit').find('#sold_out').prop('checked', true);
		}else {
			$('#modal-edit').find('#sold_out').prop('checked', false);
		}
		if (perbesar == 1) {
			$('#modal-edit').find('#perbesar').prop('checked', true);
		}else {
			$('#modal-edit').find('#perbesar').prop('checked', false);
		}
		$('iframe').contents().find('.textarea').html(caption);
	});
	$('#frm-edit').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('admin.produkUpdate')}}", data, function() {
			$('#modal-edit').modal('hide');
			$('#datatables').DataTable().ajax.reload();
			alertify.success('data berhasil di update');
		})
	});
	$('#datatables').on('click', '.delete', function() {
		const id = $(this).data('id');
		alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
			function() {
				$.post('{{route('admin.produkDelete')}}', {id: id}, function() {
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
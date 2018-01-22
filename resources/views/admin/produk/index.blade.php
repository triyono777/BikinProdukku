@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Produk</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
				Tambah Produk <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
				<div class="well">
					<form action="" method="post" id="frm-tambah">
						<div class="form-group">
							<label for="">Nama Produk</label>
							<input type="text" name="nama_produk" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Sub Kategori Produk</label>
							<select class="form-control select2" name="id_kategori" style="width: 100% !important">
								<option disabled selected>-Pilih-</option>
								@foreach($subKategori as $data)
								<option value="{{$data['id_subkategori']}}">{{$data['nama_subkategori']}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="">Biaya Operasional</label>
							<input type="text" name="biaya_operasional" class="form-control">
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" value="1" name="sold_out">
									Sold Out
								</label>
								&nbsp;
								<label>
									<input type="checkbox" value="1" name="perbesar">
									Perbesar
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="">Caption</label>
							<textarea class="form-control textarea" name="caption" rows="3"></textarea>
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
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Biaya Operasional</th>
							<th>Sold Out</th>
							<th>Perbesar</th>
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
				<form action="" id="frm-edit" method="post">
					<div class="form-group">
						<label for="">Nama Produk</label>
						<input type="text" name="nama_produk" class="form-control" id="nama_produk">
						<input type="hidden" name="id" class="form-control" id="id">
					</div>
					<div class="form-group">
						<label for="">Kategori Produk</label>
						<select class="form-control select2" name="id_kategori" id="id_kategori" style="width: 100% !important">
							<option disabled selected>-Pilih-</option>
							@foreach($subKategori as $data)
							<option value="{{$data['id_subkategori']}}">{{$data['nama_subkategori']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Biaya Operasional</label>
						<input type="text" name="biaya_operasional" id="biaya_operasional" class="form-control">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="sold_out" id="sold_out">
								Sold Out
							</label>
							&nbsp;
							<label>
								<input type="checkbox" value="1" name="perbesar" id="perbesar">
								Perbesar
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea class="form-control textarea" name="caption" rows="3" id="caption"></textarea>
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
		ajax: '{{route('admin.produkData')}}',
		columns: [
			{data: 'DT_Row_Index', orderable: false, searchable: false},
			{data: 'nama_produk'},
			{data: 'nama_kategori'},
			{data: 'biaya_operasional'},
			{data: 'sold_out'},
			{data: 'perbesar'},
			{data: 'action'},
			]
	});
	$('#frm-tambah').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		// console.log(data);
		$.post('{{route('admin.produkPost')}}', data, function(data) {
			$('#frm-tambah')[0].reset();
			$('#datatables').DataTable().ajax.reload();
			alertify.success('data berhasil di tambah');
		});
	})
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
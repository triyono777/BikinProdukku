@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Harga Bahan Baku</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Harga Bahan Baku <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="" method="post" id="frm-tambah" enctype="multiple/form-data">
					<div class="form-group">
						<label for="">Satuan</label>
						<select class="form-control select2" name="id_satuan" style="width: 100% !important">
							<option disabled selected>-Pilih-</option>
							@foreach($satuan as $data)
								<option value="{{$data['id_satuan']}}">{{$data['nama_satuan']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" name="nama_supplier" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<button class="btn btn-primary">Tambah</button>
			    </form>
			  </div>
			</div>
			<div class="table-responsive" style="margin-top: 15px;">
				<table id="datatables" width="100%" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Bahan</th>
							<th>Satuan</th>
							<th>Nama Supplier</th>
							<th>Harga</th>
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
						<label for="">Satuan</label>
						<select class="form-control select2" name="id_satuan" id="id_satuan" style="width: 100% !important">
							<option disabled selected>-Pilih-</option>
							@foreach($satuan as $data)
								<option value="{{$data['id_satuan']}}">{{$data['nama_satuan']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" name="nama_supplier" id="nama_supplier" class="form-control">
						<input type="hidden" name="id" id="id" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" id="harga" class="form-control">
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
	        ajax: '{{route('admin.subHargaBahanBakuData', [$kode_produk, $id_bahan_baku])}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'kode_bahan'},
	            {data: 'id_satuan'},
	            {data: 'nama_supplier'},
	            {data: 'harga'},
	            {data: 'action'},
	        ]
	    });

		$('#frm-tambah').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			$.post('{{route('admin.subHargaBahanBakuPost', [$kode_produk, $id_bahan_baku])}}', data, function(data) {
				$('#frm-tambah')[0].reset();
				 $('#datatables').DataTable().ajax.reload();
				 alertify.success('data berhasil di tambah');
			});
		})

		$('#datatables').on('click', '.edit', function() {
			const id = $(this).data('id');
			const id_satuan = $(this).data('id_satuan');
			const nama_supplier = $(this).data('nama');
			const harga = $(this).data('harga');

			$('#modal-edit').find('#id').val(id);
			$('#modal-edit').find('#id_satuan').val(id_satuan).change();
			$('#modal-edit').find('#nama_supplier').val(nama_supplier);
			$('#modal-edit').find('#harga').val(harga);
		});

		$('#frm-edit').on('submit', function(e) {
			e.preventDefault();
			const data = $(this).serialize();
			// console.log(data);
			$.post("{{route('admin.subHargaBahanBakuUpdate', [$kode_produk, $id_bahan_baku])}}", data, function() {
				$('#modal-edit').modal('hide');
				$('#datatables').DataTable().ajax.reload();
				alertify.success('data berhasil di update');
			})
		});

		$('#datatables').on('click', '.delete', function() {
			const id = $(this).data('id');
			alertify.confirm('Alert', 'Apakah anda yakin ingin menghapus data ini ?',
				 function() {
				 	$.post('{{route('admin.subHargaBahanBakuDelete', [$kode_produk, $id_bahan_baku])}}', {id: id}, function() {
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
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
							<option value="">1</option>
							<option value="">2</option>
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
				<table id="datatables" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Bahan</th>
							<th>Satuan</th>
							<th>Nama Supplier</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>asdasdas</td>
							<td>lusin</td>
							<td>oke dsdsa</td>
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
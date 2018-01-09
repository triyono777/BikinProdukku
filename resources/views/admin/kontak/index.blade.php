@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Kontak</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
				Tambah Kontak <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
				<div class="well">
					<form action="" method="post" id="frm-tambah">
						<div class="form-group">
							<label for="">Jenis Kontak</label>
							<input type="text" name="jenis" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Kontak</label>
							<input type="text" name="kontak" class="form-control">
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
							<th>Jenis Kontak</th>
							<th>No. Kontak</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>telepon</td>
							<th>e2384092384</th>
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
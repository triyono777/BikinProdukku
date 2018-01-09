@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Lihat Pasar</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="" method="post" id="frm-tambah" enctype="multiple/form-data">
					<div class="form-group">
						<label for="">Link</label>
						<input type="text" name="link" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" name="gambar" id="gambar" class="form-control">
					</div>
					<div class="form-group">
						<label for="">keterangan</label>
						<textarea class="textarea form-control" name="keterangan"></textarea>
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
							<th>Link</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>
								<img src="{{URL::to('dist/img/avatar2.png')}}" class="img-thumbnail" width="100" height="80">
							</td>
							<td>dkaskjdhgashd</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</td>
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
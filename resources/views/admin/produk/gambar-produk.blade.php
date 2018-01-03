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
			    <form action="" method="post" id="frm-tambah" enctype="multiple/form-data">
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
						<tr>
							<td>1</td>
							<td>
								<img src="{{URL::to('dist/img/avatar2.png')}}" class="img-thumbnail" width="100" height="80">
							</td>
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
			    <form action="" method="post" id="frm-tambah">
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
@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Testimonial</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse-tambah" aria-expanded="false" aria-controls="collapse-tambah">
			  Tambah Testimonial <i class="fa fa-plus"></i>
			</a>
			<div class="collapse" id="collapse-tambah" style="margin-top: 10px">
			  <div class="well">
			    <form action="" method="post" id="frm-tambah">
					<div class="form-group">
						<label for="">Nama Testimonial</label>
						<select class="form-control select2" name="id_user">
							<option disabled="" selected="">-Pilih-</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Isi Testimonial</label>
						<textarea class="textarea form-control" name="isi_testimonial"></textarea>
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
							<th>Nama Testimonial</th>
							<th>Isi Testimonial</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>kfjhsdgf</td>
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
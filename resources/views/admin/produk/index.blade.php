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
						<label for="">Kategori Produk</label>
						<select class="form-control select2" name="id_kategori" style="width: 100% !important">
							<option disabled selected>-Pilih-</option>
							<option value="">1</option>
							<option value="">2</option>
			    		</select>
					</div>
					<div class="form-group">
						<label for="">Biaya Operasional</label>
						<input type="text" name="biaya_operasional" class="form-control">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" name="sold_out">
								Sold Out
							</label>
							&nbsp;
							<label>
								<input type="checkbox" value="" name="perbesar">
								Perbesar
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Caption</label>
						<textarea class="form-control textarea" name="caption" rows="3"></textarea>
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
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Biaya Operasional</th>
							<th>Sold Out</th>
							<th>Perbesar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>kfjhsdgf</td>
							<td>oke oce</td>
							<td>30.4949</td>
							<td><span class="btn btn-success btn-xs">Yes</span></td>
							<td><span class="btn btn-danger btn-xs">No</span></td>
							<td>
								<a href="{{route('admin.produkDetailView', 1)}}" class="btn btn-info"><i class=" fa fa-eye"></i></a>
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
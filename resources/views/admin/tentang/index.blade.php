@extends('admin.templates.app')

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Tentang</h3>
		</div>
		<div class="box-body">
			<div class="col-md-12">
				<form method="post" action="" id="frm-tambah">
					<div class="form-group">
						<label>Isi Tentang</label>
						<textarea class="form-control textarea" name="tentang"></textarea>
					</div>
					<button class="btn btn-primary" type="submit">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
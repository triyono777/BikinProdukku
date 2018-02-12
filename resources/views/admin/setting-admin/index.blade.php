@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="page-header">Setting Admin</h3>
		</div>
		<div class="box-body">
			<div class="col-md-12">
				<form method="post" action="" id="frm-tambah">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="{{$admin['username']}}">
						<input type="hidden" name="id" id="id" value="{{$admin['id_admin']}}">
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary" type="submit">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$("#frm-tambah").on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		console.log(data);
		$.post('{{route('admin.settingAdminPost')}}',data, function(data) {
			alertify.success('Data berhasil di update !');
		})
	})
</script>
@endsection
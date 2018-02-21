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
						<textarea class="form-control textarea" name="tentang" id="tentang">{{$tentang['tentang']}}</textarea>
					<input type="hidden" name="id" id="id" value="{{$tentang['id_tentang']}}">
					</div>
					<button type="submit" class="btn btn-primary" type="submit">Update</button>
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
			$.post('{{route('admin.tentangPost')}}',data, function(data) {
				alertify.success('Data berhasil di update !');
			})
		})
	</script>
@endsection
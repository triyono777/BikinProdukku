@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h4 class="page-header">
			Data Pribadi
			</h4>
		</div>
		<form method="post" id="frm-edit">
			<div class="box-body">
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<td>ID</td>
						<td>:</td>
						<td>
							<input type="text" name="id" value="{{$id_user}}" class="form-control" readonly>
						</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>
							<input type="text" name="nik" value="{{$dataDiri['nik']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_lengkap" value="{{$dataDiri['nama_lengkap']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Tempat</td>
						<td>:</td>
						<td>
							<input type="text" name="tempat" value="{{$dataDiri['tempat']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="pria" {{$dataDiri['jenis_kelamin'] == 'pria' ? 'checked' : ' '}}>
									Pria
								</label>
								<label>
									<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="wanita" {{$dataDiri['jenis_kelamin'] == 'wanita' ? 'checked' : ' '}}>
									Wanita
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>Status Perkawinan</td>
						<td>:</td>
						<td>
							<select class="form-control" name="status_perkawinan" required="">
								<option value="kawin" {{$dataDiri['status_perkawinan'] == 'kawin' ? 'selected' : ' '}}>Kawin</option>
								<option value="belum kawin" {{$dataDiri['status_perkawinan'] == 'belum kawin' ? 'selected' : ' '}}>Belum Kawin</option>
								<option value="janda" {{$dataDiri['status_perkawinan'] == 'janda' ? 'selected' : ' '}}>Janda</option>
								<option value="duda" {{$dataDiri['status_perkawinan'] == 'duda' ? 'selected' : ' '}}>Duda</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>
							<input type="text" name="pekerjaan" value="{{$dataDiri['pekerjaan']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>
							<textarea name="alamat" class="form-control">{{$dataDiri['alamat']}}</textarea>
						</td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>:</td>
						<td>
							<img src="{{URL::to('upload/foto-pengguna/'.$dataDiri['foto'])}}" width="80" height="80" name="foto">
						</td>
					</tr>
					<tr>
						<td>Motivasi Berbisnis</td>
						<td>:</td>
						<td>
							<input type="text" name="motivasi_berbisnis" value="{{$dataDiri['motivasi_berbisnis']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Hobi</td>
						<td>:</td>
						<td>
							<input type="text" name="hobi" value="{{$dataDiri['hobi']}}" class="form-control">
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<button type="submit" class="btn btn-primary btn-block">Simpan Perubahan <i class="fa fa-edit"></i></button>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#frm-edit').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post("{{route('akun.dataPribadiPost')}}", data, function(data) {
			alertify.success('data berhasil di update');
		})
	})
</script>
@endsection
@extends('admin.templates.app')
@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h4 class="page-header">
			Detail Pengguna
			</h4>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<a href="{{URL::to('upload/foto-pengguna/'.$formulirEdar['foto'])}}">
					<img src="{{URL::to('upload/foto-pengguna/'.$formulirEdar['foto'])}}" class="img-thumbnail" width="100" height="100">
					</a>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				<div class="table-responsive" style="margin-top: 15px;">
				<table class="table table-striped">
					<tr>
						<td>Username</td>
						<td>:</td>
						<td>{{$pengguna['username']}}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>{{$pengguna['email']}}</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>{{$formulirEdar['nama_lengkap']}}</td>
					</tr>
					<tr>
						<td>Tempat</td>
						<td>:</td>
						<td>{{$formulirEdar['tempat']}}</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>{{date('d-F-Y', strtotime($formulirEdar['tgl_lahir']))}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>{{$formulirEdar['jenis_kelamin']}}</td>
					</tr>
					<tr>
						<td>Status Perkawinan</td>
						<td>:</td>
						<td>{{$formulirEdar['status_perkawinan']}}</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>{{$formulirEdar['pekerjaan']}}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{{$formulirEdar['alamat']}}</td>
					</tr>
					<tr>
						<td>Motivasi Berbisnis</td>
						<td>:</td>
						<td>{{$formulirEdar['motivasi_berbisnis']}}</td>
					</tr>
					<tr>
						<td>Hobi</td>
						<td>:</td>
						<td>{{$formulirEdar['hobi']}}</td>
					</tr>
				</table>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h4 class="page-header">
			History Transaksi Pengguna
			</h4>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table id="datatables" class="table table-hover table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Invoice</th>
									<th>Tanggal Transaksi</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
	<script type="text/javascript">
		$('#datatables').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{route('admin.penggunaTransaksi', $pengguna['id_user'])}}',
	        columns: [
	            {data: 'DT_Row_Index', orderable: false, searchable: false},
	            {data: 'kode_invoice'},
	            {data: 'tanggal'},
	            {data: 'action'},
	        ]
	    });
	   </script>
@endsection
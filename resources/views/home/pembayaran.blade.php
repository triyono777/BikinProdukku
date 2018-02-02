@extends('home.templates.app2')
@section('content')
<div class="col-md-12 col-xs-12" style="margin-top: 150px">
	<div class="card">
		<div class="card-header">
			<h4 style="text-align: center;">Konfirmasi Pembayaran</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<span class="badge badge-danger">Upload bukti pembayaran di Halaman ini. !</span>
					<p>Kirim pembayaran melalui rekening kami.</p>
					<ul>
						<li>BNI : 847538458734658345</li>
						<li>BRI : 837482364823743423</li>
					</ul>
				</div>
				<div class="col-md-6">
					<form method="post" action="{{route('cart.pembayaranPost')}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label>Upload Bukti Pembayaran</label>
							<input type="file" name="bukti_pembayaran" class="form-control">
						</div>
						<button class="btn btn-primary" type="submit">Konfirmasi</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
@if(session()->has('success'))
	alert('{{session()->get('success')}}')
@endif
</script>
@endsection
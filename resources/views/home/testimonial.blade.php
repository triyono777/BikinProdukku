@extends('home.templates.app2')
@section('content')
<div class="container" style="margin-top: 140px">
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<h2>Testimonial</h2>
		</div>
		@foreach($testimonial as $data)
		<div class="col-md-4" style="margin-top: 20px">
			<div class="card">
				<div class="card-body">
				<blockquote class="blockquote">{!! $data['testimonial'] !!}</blockquote>
			<footer class="blockquote-footer">{{$data['pengguna']['nama']}}</footer>
		</div>
	</div>
</div>
@endforeach
</div>
</div>
@endsection
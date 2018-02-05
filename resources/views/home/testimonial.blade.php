@extends('home.templates.app2')
@section('content')
<div class="container" style="margin-top: 140px">
	<div class="row">
		@if(auth()->guard('pengguna')->check())
		<div class="col-md-2"></div>
		<div class="col-md-8 col-xs-12">
			<form action="{{route('testimonialPost')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label>Isi Testimonial Anda Disini</label>
					<textarea class="form-control textarea" name="testimonial"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
		@endif
		<div class="col-md-12" style="text-align: center;margin-top: 50px">
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
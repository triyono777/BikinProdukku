@extends('home.templates.app2')
@section('content')
<div class="container" style="margin-top: 140px">
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<h2>Lihat Pasar</h2>
		</div>
		@foreach($lihat_pasar as $data)
		<div class="col-md-4" style="margin-top: 20px">
			<div class="card">
				<img class="card-img-top" src="{{URL::to('upload/lihat-pasar/'.$data['gambar'])}}" alt="Card image">
				<div class="card-body">
					<h5 class="card-title"><a href="{{$data['link']}}">{{$data['link']}}</a></h5>
					<p class="card-text">{!! $data['keterangan'] !!}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
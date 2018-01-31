@extends('home.templates.app2')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 150px">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					@foreach( $slider as $photo )
					<li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
					@endforeach
				</ol>
				<div class="carousel-inner">
					@foreach( $slider as $photo )
					<div class="carousel-item {{ $loop->first ? ' active' : '' }}">
						<img class="d-block w-100 h-100" src="{{ asset('upload/banner/'.$photo->gambar) }}" style="max-height: 100%;max-width: 100%">
					</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 50px">
		<div class="col-md-12" style="background-color: orange">
			<h2 style="text-align: center;">{{$subkategori['nama_subkategori']}}</h2>
		</div>
		@foreach($produk as $key => $value)
		@foreach($value['gambarproduk'] as $data)
		{{-- @if($value['perbesar'] == 1) --}}
		{{-- <div class="row"> --}}
			<div class="col-lg-4" style="margin-top: 50px">
				<a href="{{route('transaksi', [$value['kode_produk'], $data['kode_gambar']])}}">
					<img src="{{asset('upload/gambar-produk/'.$data['gambar_tampilan'])}}"  width="80%">
				</a>
			</div>
		{{-- </div> --}}
		{{-- @endif --}}
		@endforeach
		@endforeach
		<div class="col-md-8 col-md-offset-2">
			{{$produk->links()}}
		</div>
	</div>
</div>
@endsection
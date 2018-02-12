@extends('home.templates.app2')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="" style="margin-top: 40px">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					@foreach( $slider as $photo )
					<li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
					@endforeach
				</ol>
				<div class="carousel-inner">
					@foreach( $slider as $photo )
					<div class="carousel-item {{ $loop->first ? ' active' : '' }}">
						<img class="d-block" src="{{ asset('upload/banner/'.$photo->gambar) }}" style="height: auto;width: 100%">
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
	<div class="row">
		{{-- <div class="col-md-12" style="background-color: orange">
			<h2 style="text-align: center;">{{$subkategori['nama_subkategori']}}</h2>
		</div> --}}
		<div class="col-md-12" style="margin-bottom: 70px">
			<div class=" new_arrivals_title">
				<h2 style="color: #fe4c50" align="center">Pilih Jenis Produk Anda</h2>
			</div>
		</div>
		@foreach($produk as $key => $value)
		@foreach($value['gambarproduk'] as $data)
		{{-- @if($value['perbesar'] == 1) --}}
		{{-- <div class="row"> --}}
			<div class="col-lg-3" style="margin-top: 20px">
				<a class="bg-hover" href="{{route('transaksi', [$value['kode_produk'], $data['kode_gambar']])}}">
					<img src="{{asset('upload/gambar-produk/'.$data['gambar_text'])}}"  width="100%">
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
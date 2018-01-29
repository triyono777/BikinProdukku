@extends('home.templates.app')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 slider">
			<div class="panel-thumbnail ">
				<div id="myCarousel" class="carousel slide slider" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						@foreach( $slider as $photo )
						<li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
						@endforeach
					</ol>

				<div class="carousel-inner" role="listbox">
				@foreach( $slider as $photo )
					<div class="item {{ $loop->first ? ' active' : '' }} mySlides" >
					<a href="#!">
						<img src="{{ asset('upload/banner/'.$photo->gambar) }}" alt="" class="img-responsive img-slider" style="max-height: 20%;">
					</a>
					</div>
				@endforeach
				</div>
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			  </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" style="background-color: orange">
			<h2 style="text-align: center;">{{$subkategori['nama_subkategori']}}</h2>
		</div>
		<div class="col-md-12" style="margin-top: 50px">
				@foreach($produk as $key => $value)
					@foreach($value['gambarproduk'] as $data)
						{{-- @if($value['perbesar'] == 1) --}}
						{{-- <div class="row"> --}}
							<div class="col-md-4">
								<a href="{{route('transaksi', [$value['kode_produk'], $data['kode_gambar']])}}">
									<img src="{{asset('upload/gambar-produk/'.$data['gambar_tampilan'])}}" class="img-responsive">
								</a>
							</div>
						{{-- </div> --}}
						{{-- @endif --}}
					@endforeach
				@endforeach
		</div>
	</div>
	<br>
	<div class="row" style="background-color: #e87874;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<img src="{{ asset('dist/img/logo.jpg') }}" alt=""  class="img-responsive" height="120px" style="margin:0 auto;
				padding-top:8px">
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt numquam iste, suscipit officiis esse blanditiis laudantium, nisi voluptates ab beatae, voluptas quae soluta eaque modi vero quod consectetur asperiores iure?
				</div>
				<div class="col-md-3">
					<h4 style="text-align:center">Tentang Kami</h4>
					<ul style="list-style:none">
						<li>> Profil</li>
						<li>> Kebijakan Privasi</li>
						<li>> Program Mitra B-Pro</li>
						<li>> Reseller B-Pro</li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4 style="text-align:center">Layanan Mitra B-Pro</h4>
					<ul style="list-style:none">
						<li>> Jadwal Konsultasi</li>
						<li>> Kebijakan Privasi</li>
						<li>> Status Pembayaran</li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4 style="text-align:center">Jam Layanan</h4>
					<table align="center">
						<tr>
							<td>Jam Buka</td>
							<td></td>
							<td>09.00 WIB</td>
						</tr>
						<tr>
							<td>Jam Tutup</td>
							<td></td>
							<td>17.00 WIB</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					Jl. Lorem ipsum
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
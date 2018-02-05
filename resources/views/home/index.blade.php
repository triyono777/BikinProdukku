@extends('home.templates.app2')
@section('content')
<!-- Slider -->
<div class="main_slider">
	<div class=" fill_height">
			<h1 align="center" style="margin-bottom: 0; margin-top: 0;">"1 Klik Jadi Pengusaha Millenial"</h1>
		<div class="row align-items-center fill_height">
			<iframe width="100%" height="600" src="{{$banner->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
	</div>
</div>

<!-- Banner -->
<div class="banner" style="margin-top: 100px">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="text-align: center;margin-bottom: 80px">
				<h3>Kami membantu kebutuhan Anda dalam menciptakan produk makanan ringan unggulan.</h3>
			</div>
			@foreach($dialogProses as $key => $value)
			<div class="col-md-4" style="margin-top: 20px">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('upload/dialog-proses/'. $value['gambar'])}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step {{++$key}}</h2>
							<h5 style="color: white">{{$value['keterangan']}}</h5>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="col-md-12" style="text-align: center;margin-bottom: 80px">
				<h3>Terima kasih Mitra B-Pro yang telah mempercayakan produknya kepada kami.</h3>
			</div>
			@foreach(range(1, 4) as $data)
			<div class="col-md-3">
				<img src="http://1.bp.blogspot.com/-yPFlDrpXBk4/VIPkXMY1Q9I/AAAAAAAAFBg/dx9fCjQgOPo/s1600/chunky1.jpg" alt="" class="img-responsive" width="80%" style="border: 2px solid #cccccc">
			</div>
			@endforeach
		</div>
	</div>
	<!-- New Arrivals -->
	<div class="new_arrivals" style="margin-top: 80px">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="section_title new_arrivals_title">
						<h2 style="color: #fe4c50">Kenapa harus jadi Mitra B-Pro ?</h2>
					</div>
				</div>
				<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top: 100px">
					<ol>
						<li><h5>Anda akan menjadi bos untuk brand sendiri</h5></li>
						<li><h5>Punya produk sendirit tanpa harus produksi (sangat disarankan untuk pemula)</h5></li>
						<li><h5>Tersedia 57+ jenis bahan baku</h5></li>
						<li><h5>Bebas desain produk sesuka hati</h5></li>
						<li><h5>Gratis konsultasi</h5></li>
						<li><h5>Tanpa resiko</h5></li>
						<li><h5>Garansi uang kembali</h5></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	@endsection
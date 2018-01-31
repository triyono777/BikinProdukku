@extends('home.templates.app2')
@section('content')
<!-- Slider -->
<div class="main_slider">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col-xs-12">
				<h1>"1 Klik Jadi Pengusaha Millenial"</h1>
			</div>
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
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 1 (MEMILIH BAHAN) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 1</h2>
							<h5 style="color: white">Memilih Bahan Baku</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 2 (MENDESAIN KEMASAN) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 2</h2>
							<h5 style="color: white">Mendesain Kemasan Yang Ngilerin</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 3 (MENGHITUNG BIAYA) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 3</h2>
							<h5 style="color: white">Menghitung Biaya Produksi (HPP)</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 40px">
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 4 (MENENTUKAN HARGA) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 4</h2>
							<h5 style="color: white">Menentukan Harga Jual</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 5 (MENDAPATKAN KEUNTUNGAN) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 5</h2>
							<h5 style="color: white">Menentukan Keuntungan</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('point/POINT 6 (BANTUAN MENDAPAT NOMOR) A.png')}}" class="img-responsive" width="50%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h2 style="color:white;padding:20px 10px 10px 10px;">Step 6</h2>
							<h5 style="color: white">Bantuan Mendapatkan Nomor Ijin Produk</h5>
						</div>
					</div>
				</div>
			</div>
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
@extends('home.templates.app2')
@section('content')
<!-- Slider -->
<div class="main_slider">
	<div class=" fill_height">
		{{-- <h1 align="center" style="margin-bottom: 0; margin-top: 0;">"1 Klik Jadi Pengusaha Millenial"</h1> --}}
		<div class="row align-items-center fill_height">
			<iframe width="100%" height="600" src="{{$banner->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
	</div>
</div>
<!-- Banner -->
<div class="container">
	<div class="col-md-12">
		<a href="{{route('kemasan.all')}}" class="pull-right btn btn-danger">Bikin Produkmu Sekarang</a>
	</div>
</div>
<div class="banner" style="margin-top: 100px">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="text-align: center;margin-bottom: 80px">
				<h3>Kami membantu kebutuhan Anda dalam menciptakan produk makanan ringan unggulan.</h3>
			</div>
			@foreach($dialogProses as $key => $value)
			<div class="col-md-4" style="margin-top: 20px">
				<div class="cuadro_intro_hover ">
					<p style="text-align:center; margin-top:20px;">
						<img src="{{URL::to('upload/dialog-proses/'. $value['gambar'])}}" class="img-responsive" width="80%" alt="">
					</p>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text" style="padding-top: 40px">
							<h2 style="color:black;padding:20px 10px 10px 10px;">Step {{++$key}}</h2>
							<h5 style="color: black">{{$value['keterangan']}}</h5>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="col-md-12">
				<h4 style="text-align: center">Terima kasih untuk Boss B-Pro yang telah mempercayakan produknya kepada kami.</h4>
			</div>
			@foreach($testimonial as $data)
			<div class="col-md-3" style="margin-top: 40px">
				<img src="{{URL::to('upload/testimonial/'.$data['gambar'])}}" class="rounded-circle img-responsive" style="border: 2px solid #E5E5E5" width="100%">
				<div style="text-align:center;margin-top: 5px">
				<blockquote class="blockquote">{!! $data['testimonial'] !!}</blockquote>
				<footer class="blockquote-footer">{{$data['pengguna']['nama']}}</footer>
				</div>
			</div>
			@endforeach
</div>
</div>
<div class="new_arrivals" style="margin-top: 80px">
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class=" new_arrivals_title">
				<h2 style="color: #fe4c50">Kenapa harus jadi Mitra B-Pro ?</h2>
			</div>
		</div>
		<div class="col-md-6 col-xs-12" style="margin-top: 40px">
			<ul class="ul-list">
				<li>
					<img src="{{URL::to('icon/png/1.png')}}" width="15%">
					Hak memiliki brand <b>1000%</b>
				</li>
				<li>
					<img src="{{URL::to('icon/png/2.png')}}" width="15%">
					Hak produk dengan <b>KUALITAS TINGGI</b>
				</li>
				<li>
					<img src="{{URL::to('icon/png/3.png')}}" width="15%">
					Arahan untuk mendapatkan <b>LABEL HALAL</b> dari MUI
				</li>
				<li>
					<img src="{{URL::to('icon/png/4.png')}}" width="15%" style="float: left">
					<div style="padding-top: 10px">
						Arahan untuk mendapatkan <b>NOMOR IJIN EDAR</b> dari Dinas Kesehatan
					</div>
				</li>
			</ul>
		</div>
		<div class="col-md-6 colxs-12" style="margin-top: 40px">
			<ul class="ul-list">
				<li>
					<img src="{{URL::to('icon/png/5.png')}}" width="15%">
					Mendapatkan <b>CONTEKAN</b> Proyeksi Keuangan
				</li>
				<li>
					<div>
						<img src="{{URL::to('icon/png/6.png')}}" width="15%">
						Mendapatkan <b>Bocoran</b> teknik <b>PEMASARAN</b> Produk
					</div>
				</li>
				<li>
					<div>
						<img src="{{URL::to('icon/png/7.png')}}" width="15%" style="float: left;">
						Mendapatkan <b>MARKETING KIT</b> <br>
						(Kartu Nama dan Banner - Soft Copy)
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<div class="" style="margin-top: 80px;background-color: #FFE78A">
<div class="container">
	<div class="row" style="padding: 30px">
		<div class="col-md-12" style="text-align: center;margin-bottom: 80px">
			<h2><b>Tim B-Pro siap membantu Anda</b></h2>
		</div>
		@foreach(range(1, 3) as $data)
		<div class="col-md-4">
			<img src="{{ asset('icon/png/29.png') }}" alt="" class="rounded-circle img-responsive" width="100%%" style="border: 2px solid #E5E5E5">
		</div>
		@endforeach
	</div>
</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12 text-center">
		<div class=" new_arrivals_title">
			<h2 style="color: #fe4c50">JADILAH BAGIAN DARI KAMI</h2>
		</div>
	</div>
	<div style="margin-top: 20px">
		<ul class="ul-list2">
			<li><img src="{{URL::to('icon/png/13.png')}}" width="10%" class=""></li>
			<li><img src="{{URL::to('icon/png/15.png')}}" width="10%" class=""></li>
			<li><img src="{{URL::to('icon/png/17.png')}}" width="10%" class=""></li>
			<li><img src="{{URL::to('icon/png/19.png')}}" width="10%" class=""></li>
		</ul>
	</div>
	<div style="margin-top: 10px">
		<ul class="ul-list2">
			<li><img src="{{URL::to('icon/png/14.png')}}" width="10%" class=""></li>
			<li><img src="{{URL::to('icon/png/16.png')}}" width="10%" class=""></li>
			<li><img src="{{URL::to('icon/png/18.png')}}" width="10%" class=""></li>
		</ul>
	</div>
</div>
</div>
<div class="container" style="margin-top: 100px">
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 col-xs-12">
		<h5>Daftar sekarang untuk menerima informasi produk, pasar, promosi, bonus & lainnya</h5>
		<form method="post" action="{{route('daftar')}}">
			{{csrf_field()}}
			<div class="form-group {{$errors->has('nama') ? 'has-error' : ' '}}"">
				<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda">
			</div>
			@if($errors->has('nama'))
			<span style="color: red" class="help-block">{{$errors->first('nama')}}</span>
			@endif
			<div class="form-group {{$errors->has('email') ? 'has-error' : ' '}}"">
				<input type="email" name="email" class="form-control" placeholder="Masukan Email Anda">
			</div>
			@if($errors->has('email'))
			<span style="color: red" class="help-block">{{$errors->first('email')}}</span>
			@endif
			<div class="form-group {{$errors->has('no_wa') ? 'has-error' : ' '}}"">
				<input type="text" name="no_wa" class="form-control" placeholder="Masukan Nomor Whatsapp Anda">
			</div>
			@if($errors->has('no_wa'))
			<span style="color: red" class="help-block">{{$errors->first('no_wa')}}</span>
			@endif
			<button type="submit" class="btn btn-warning">Daftar</button>
		</form>
	</div>
</div>
</div>
<div class="container" style="margin-top: 50px">
<div class="col-md-12">
	<a href="{{route('kemasan.all')}}" class="pull-right btn btn-danger">Bikin Produkmu Sekarang</a>
</div>
</div>
@endsection
@section('customJs')
@if(Session::has('success'))
<script type="text/javascript">
		alert('{{Session::get('success')}}');
</script>
@endif
@endsection
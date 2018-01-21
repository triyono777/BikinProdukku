<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BikinProdukku.com</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">BikinProdukku.com</a>
				</div>
				<!-- Collection of nav links and other content for toggling -->
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Profile</a></li>
						<li><a href="#">Messages</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#modal-register" data-toggle="modal">Daftar</a></li>
						<li><a href="#modal-login" data-toggle="modal">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
		{{-- modal login --}}
		<div class="modal fade" id="modal-login">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Masuk Ke Akun</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="{{route('admin.penggunaLogin')}}">
							{{csrf_field()}}
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
								<input type="hidden" name="level" value="pengguna">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		{{-- modal Register --}}
		<div class="modal fade" id="modal-register">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Daftar Akun</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="{{route('admin.registerPost')}}" id="frm-register">
							{{csrf_field()}}
							<div class="form-group {{$errors->has('nama') ? 'has-error' : ' '}}">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama" required="">
							</div>
							@if($errors->has('nama'))
							<span style="color: red" class="help-block">{{$errors->first('nama')}}</span>
							@endif
							<div class="form-group {{$errors->has('email') ? 'has-error' : ' '}}">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email" required="">
							</div>
							@if($errors->has('email'))
							<span style="color: red" class="help-block">{{$errors->first('email')}}</span>
							@endif
							<div class="form-group {{$errors->has('whatsapp') ? 'has-error' : ' '}}">
								<label>No. Whatsapp</label>
								<input type="text" name="whatsapp" class="form-control" placeholder="No. Whatsapp" required="">
							</div>
							@if($errors->has('whatsapp'))
							<span style="color: red" class="help-block">{{$errors->first('whatsapp')}}</span>
							@endif
							<div class="form-group {{$errors->has('username') ? 'has-error' : ' '}}">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username" required="">
							</div>
							@if($errors->has('username'))
							<span style="color: red" class="help-block">{{$errors->first('username')}}</span>
							@endif
							<div class="form-group {{$errors->has('password') ? 'has-error' : ' '}}">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password" required="">
							</div>
							@if($errors->has('password'))
							<span style="color: red" class="help-block">{{$errors->first('password')}}</span>
							@endif
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-xs-12" style="background-color: black; padding:50px 0px ">
					<h1 style="color:#fff;font-size: 70px;text-align: center;">"1 Klik Jadi Pengusaha Millenial"</h1>
					<div class="col-lg-8 col-xs-8 col-lg-offset-1">
						<iframe width="1090" height="500" src="https://www.youtube.com/embed/yacDlrwsABY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container">
					<div class="col-lg-12 col-xs-12" style="margin: 20px 0px 70px 0px">
						<a href="#!" class="btn btn-danger pull-right">Bikin Produkku sekarang</a>
					</div>
					<div class="col-lg-12 col-xs-12" style="text-align: center;">
						<h4 style="margin-bottom: 70px">Kami membantu kebutuhan Anda dalam menciptakan produk makanan ringan unggulan</h4>
						<div class="row">
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
						</div>
						<div class="row" style="margin-top: 50px">
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
							<div class="col-lg-3 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q">
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-xs-12">
						<div style="text-align: center;margin-top: 90px">
							<h4 style="margin-bottom: 30px">Terima kasih Mitra B-Pro yang telah mempercayakan produknya kepada kami.</h4>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
							<div class="col-lg-2 col-xs-6">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ3Yw6xjzpQo93GtRO_ib5DYmtsP87OU1lWIlNAn3AcrpAfn-1Q" width="100">
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-xs-12">
						<h2 style="color: red; text-align:center">Kenapa harus jadi Mitra B-Pro ?</h2>
						<div>
							<ul>
								<li>Anda akan menjadi bos untuk brand sendiri</li>
								<li>Punya produk sendirit tanpa harus produksi (sangat disarankan untuk pemula)</li>
								<li>Tersedia 57+ jenis bahan baku</li>
								<li>Bebas desain produk sesuka hati</li>
								<li>Gratis konsultasi</li>
								<li>Tanpa resiko</li>
								<li>Garansi uang kembali</li>
							</ul>
							<div class="pull-right">
								<a href="">Lihat 30 Lainnya </a>
							</div>
						</div>
					</div>

					
				</div>
			</div>
			<div class="row" style='background-color:#c1c1c1'>
				<div class="col-lg-12 col-xs-12">
					<h2 style="color: red; text-align:center">Tim B-Pro Siap Membantu Anda !</h2>
					<p style="text-align:center">Sangat Mudah untuk menggunakan Bikinprodukku.com. Tetapi Jika Memiliki Pertanyaan,tim  </p>

					<div class="row">
						<div class="container">
							<div class="col-md-4">
								<img src="" alt="" class="img-circle img-responsive">
							</div>
							<div class="col-md-4">
								<img src="" alt="" class="img-circle img-responsive">
							</div>
							<div class="col-md-4">
								<img src="" alt="" class="img-circle img-responsive">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2 style="text-align:center">Jadilah Bagian Dari Kami</h2>
					{{--  //gambar  --}}
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="" alt="">
						</div>
					</div>
					
					<div class="row">
						<div class="container">
							<h2 style="text-align:center">Daftar Sekarang Untuk Menerima Informasi Produk,Pasar,Promosi,Bonus dan Lainnya</h2>
							<div class="col-md-8 col-md-offset-2">
								<form action="">
									<div class="form-group">
										<input type="text" class="form-control" name="" placeholder="">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="" placeholder="">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="" placeholder="">
									</div>
									<input type="submit" class="btn btn-warning" value="kirim">
								</form>
							</div>
						</div>
					</div>
					<div class="pull-right">
						<button class="btn btn-md btn-danger">Bikin Produkmu Sekarang</button>
					</div>
				</div>
			</div>
			<br>
			<div class="row" style="background-color: #e87874;">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3">
							<img src="" alt="">
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
		<!-- jQuery -->
		<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		@section('customJs')
		@if(Session::has('login'))
		<script type="text/javascript">
			$(document).ready(function() {
				alert('Selamat akun anda sudah terdaftar, Silahkan login !');
			})
		</script>
		@endif
@endsection
	</body>
</html>
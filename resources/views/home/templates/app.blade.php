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
		    <!-- Brand and toggle get grouped for better mobile display -->
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
		            <li><a href="#">Daftar</a></li>
		            <li><a href="#">Login</a></li>
		        </ul>
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
							<form method="post" action="{{route('admin.registerPost')}}">
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
						<div class="col-lg-12" style="margin: 20px 0px 70px 0px">
							<a href="#!" class="btn btn-danger pull-right">Bikin Produkku sekarang</a>
						</div>
						<div class="col-lg-12" style="text-align: center;">
							<h4 style="margin-bottom: 70px">Kami membantu kebutuhan Anda dalam menciptakan produk makanan ringan unggulan</h4>

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
				</div>
			</div>
			<!-- jQuery -->
			<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
			<!-- Bootstrap JavaScript -->
			<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		</body>
	</html>
<!-- Header -->
<header class="header trans_300">
	<!-- Top Navigation -->
	{{-- <div class="top_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6 text-right">
					<div class="top_nav_right">
						<ul class="top_nav_menu" id="ul-login">
							<li class="language">
								<a href="{{route('home.cart')}}">
									Cart
									<i class="fa fa-shopping-cart"></i>
									@if($jumlah_cart != 0)
										<span class="badge badge-danger">{{$jumlah_cart}}</span>
									@else

									@endif
								</a>
							</li>
							@if(!auth()->guard('pengguna')->check())
							<span id="ul-login">
							<li class="account">
								<a href="#modal-register" data-toggle="modal">Daftar</a>
							</li>
							<li class="account">
								<a href="#modal-login" data-toggle="modal">Login</a>
							</li>
							</span>
							@else
							<li class="account">
								<a href="#">
									{{auth()->guard('pengguna')->user()->username}}
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="account_selection">
									<li>
										<a href="{{route('akun.penggunaView')}}"> Dashboard</a>
									</li>
									<li>
										<a href="{{route('akun.logout')}}">Logout</a>
									</li>
								</ul>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- Main Navigation -->
	<div class="main_nav_container" style="background-color: #F7F416">
		<div class="">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo_container">
						<a href="{{url('/')}}"><img src="{{URL::to('icon/png/28.png')}}" class="img-responsive" width="29%"></a>
					</div>
					<nav class="navbar">
						<ul class="navbar_menu">
							<li class="{{active('kemasan.all')}}">
								<a href="{{route('kemasan.all')}}">Buat Produkku</a>
							</li>
							<li class="{{active('faq')}}"><a href="{{route('faq')}}">Faq</a></li>
							<li class="{{active('cs')}}"><a href="{{route('cs', 'beli-terpisah')}}">Beli Terpisah</a></li>
							<li class="{{active('lihat_pasar')}}"><a href="{{route('lihat_pasar')}}">Lihat Pasar</a></li>
							<li class="{{active('home.cart')}}">
								<a href="{{route('home.cart')}}">
									Cart
									<i class="fa fa-shopping-cart"></i>
									@if($jumlah_cart == 0)
										<span class="badge badge-info">0</span>
									@else
										<span class="badge badge-info">{{$jumlah_cart}}</span>
									@endif
								</a>
							</li>
							@if(!auth()->guard('pengguna')->check())
							<span id="ul-login">
							<li>
								<a href="#modal-register" data-toggle="modal">Daftar</a>
							</li>
							<li>
								<a href="#modal-login" data-toggle="modal">Masuk</a>
							</li>
							</span>
							@else
							<li class="account">
								<a href="#!">
									{{auth()->guard('pengguna')->user()->username}}
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="account_selection">
									<li>
										<a href="{{route('akun.penggunaView')}}"> Dashboard</a>
									</li>
									<li>
										<a href="{{route('akun.logout')}}">Logout</a>
									</li>
								</ul>
							</li>
							@endif
						</ul>
						<div class="hamburger_container">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="fs_menu_overlay"></div>
			<div class="hamburger_menu">
				<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
				<div class="hamburger_menu_content text-right">
					<ul class="menu_top_nav">
						<li class="{{active('kemasan.all')}} menu_item">
								<a href="{{route('kemasan.all')}}">Buat Produkku</a>
							</li>
							<li class="{{active('faq')}} menu_item"><a href="{{route('faq')}}">Faq</a></li>
							<li class="{{active('cs')}} menu_item"><a href="{{route('cs', 'beli-terpisah')}}">Beli Terpisah</a></li>
							<li class="{{active('lihat_pasar')}} menu_item"><a href="{{route('lihat_pasar')}}">Lihat Pasar</a></li>
							<li class="{{active('home.cart')}} menu_item">
								<a href="{{route('home.cart')}}">
									Cart
									<i class="fa fa-shopping-cart"></i>
									@if($jumlah_cart == 0)
										<span class="badge badge-info">0</span>
									@else
										<span class="badge badge-info">{{$jumlah_cart}}</span>
									@endif
								</a>
							</li>
							@if(!auth()->guard('pengguna')->check())
							<span id="ul-login">
							<li class="menu_item">
								<a href="#modal-register" data-toggle="modal">Daftar</a>
							</li>
							<li class="menu_item">
								<a href="#modal-login" data-toggle="modal">Masuk</a>
							</li>
							</span>
							@else
							<li class="menu_item has-children">
								<a href="#!">
									{{auth()->guard('pengguna')->user()->username}}
									<i class="fa fa-angle-down"></i>
								</a>
								<ul class="menu_selection">
									<li>
										<a href="{{route('akun.penggunaView')}}"> Dashboard</a>
									</li>
									<li>
										<a href="{{route('akun.logout')}}">Logout</a>
									</li>
								</ul>
							</li>
							@endif
					</ul>
				</div>
			</div>
</header>

{{-- modal login --}}
<div class="modal fade" id="modal-login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Masuk Ke Akun</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('admin.penggunaLogin')}}" id="loginAkun">
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
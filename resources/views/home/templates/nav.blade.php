<section id="header">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="{{url('/')}}" class="navbar-brand">BikinProdukku.com</a>
			</div>
			<!-- Collection of nav links and other content for toggling -->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-large">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Produk <b class="caret"></b></a>
						<ul class="dropdown-menu dropdown-menu-large row">
							@foreach($kategori as $item)
							<li class="col-sm-3">
								<ul>
									<li class="dropdown-header">{{$item['nama_kategori']}}</li>
									@foreach($item['sub_kategori'] as $value)
									<li><a href="{{route('kemasan', $value['id_subkategori'])}}">{{$value['nama_subkategori']}}</a></li>
									@endforeach
								</ul>
							</li>
							@endforeach
						</ul>
					</li>
					@if(auth()->guard('pengguna')->check())
					<li><a href="{{route('faq')}}">Faq</a></li>
					@endif
					<li><a href="#">Lihat Pasar</a></li>
				</ul>
				@if(!auth()->guard('pengguna')->check())
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#modal-register" data-toggle="modal">Daftar</a></li>
					<li><a href="#modal-login" data-toggle="modal">Login</a></li>
				</ul>
				@else
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->guard('pengguna')->user()->username}} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('akun.penggunaView')}}"> Dashboard</a>
							</li>
							<li>
								<a href="{{route('akun.logout')}}">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				@endif
			</div>
		</div>
	</nav>
</section>
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
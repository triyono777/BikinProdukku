<!DOCTYPE html>
<html>
	<head>
		<title>BikinProdukku.com</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="{{URL::to('bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{URL::to('bower_components/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{URL::to('plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
	</head>
	<style>
	.scroll-area{
	width:100%;
	height:480px;
	overflow-y:scroll;
	}
	</style>
	<body>
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
						<form method="post" action="{{route('admin.loginAkun')}}" id="loginAkun">
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
		<section id="content" class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Gambar Produk
						</div>
						<div class="panel-body">
							<div class="scroll-area">
								<div class="thumbnail">
									<img src="{{URL::to('mockup/MOCK UP A1 krem.png')}}"/>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/MOCK UP B1 krem.png')}}"/>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/MOCK UP C1 krem.png')}}"/>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/MOCK UP D1 krem.png')}}"/>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/MOCK UP E1 krem.png')}}"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Canvas
						</div>
						<div class="panel-body">
							<div>
								<canvas width="720" height="480" id="cvs"  style="display:block;margin:0 auto;"></canvas>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row">
								<button class="btn" style="background-color:#ff1a1a;color:#ff1a1a;" onclick="warna('#ff1a1a')">test</button>
								<button class="btn" style="background-color:#ffff00;color:#ffff00;" onclick="warna('#ffff00')">test</button>
								<button class="btn" style="background-color:#e600e6;color:#e600e6;" onclick="warna('#e600e6')">test</button>
								<button class="btn" style="background-color:#1aff1a;color:#1aff1a;" onclick="warna('#1aff1a')">test</button>
								<button class="btn" style="background-color:#00bfff;color:#00bfff;" onclick="warna('#00bfff')">test</button>
								<button class="btn" style="background-color:#ffa31a;color:#ffa31a;" onclick="warna('#ffa31a')">test</button>
								<button class="btn" style="background-color:#ffdab3;color:#ffdab3;" onclick="warna('#ffdab3')">test</button>
								<a class="btn" download="my-file-name.png" id="btDownload" onclick="downloadgmbr()">Downlload Gambar</a><br><br>
							</div>
							<div class="row">
								<div class="col col-md-4">
									<label>Upload Design Logo Sendiri</label>
									<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="imageLoader"/>
									<br>
									<br>
								</div>
								<div class="col col-md-4">
									<label>Position Uploaded Design</label>
									<br>
									<button class="btn" onclick="fUp()"><span class="fa fa-arrow-up "></span></button>
									<button class="btn" onclick="fDown()"><span class="fa fa-arrow-down "></span></button>
									<button class="btn" onclick="fLeft()"><span class="fa fa-arrow-left "></span></button>
									<button class="btn" onclick="fRight()"><span class="fa fa-arrow-right "></span></button>
									<br>
									<br>
								</div>
								<div class="col col-md-4">
									<label>Size Uploaded Design</label>
									<br>
									<button class="btn" onclick="fplus()"><span class="fa fa-plus "></span></button>
									<button class="btn" onclick="fminus()"><span class="fa fa-minus"></span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Gambar Templates
						</div>
						<div class="panel-body">
							<div class="scroll-area">
								<div class="thumbnail">
									<img src="{{URL::to('mockup/mens_hoodie_front.png')}}" onclick="gntgmbr('g0','gT0')" id="g0"/>
									<img style="display:none;" src="gambar text 1.png" id="gT0"/>
									<label>Tersedia</label>
									<br>
									<label>Rp 18000</label>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/mens_longsleeve_front - Copy (2).png')}}" onclick="gntgmbr('g1','gT1')" id="g1"/>
									<img style="display:none;" src="gambar text 1.png" id="gT1"/>
									<label>Tersedia</label>
									<br>
									<label>Rp 0</label>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/A1 copy.png')}}" onclick="gntgmbr('g2','gT2')" id="g2"/>
									<img style="display:none;" src="gambar text 1.png" id="gT2"/>
									<label>Tersedia</label>
									<br>
									<label>Rp 0</label>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/C1 copy.png')}}" onclick="gntgmbr('g3','gT2')" id="g3"/>
									<label>Terjual</label>
									<br>
									<label>Rp 45000</label>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/D1 copy.png')}}" onclick="gntgmbr('g4','gT2')" id="g4"/>
								</div>
								<div class="thumbnail">
									<img src="{{URL::to('mockup/E1 copy.png')}}" onclick="gntgmbr('g5','gT2')" id="g5"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="khusus_modal">
		</section>
		<section style="margin-top: 10px" id="biaya-produksi">
			@if(auth()->guard('pengguna')->check())
			<div class="container-fluid" style="background-color: aqua">
				<h3 style="text-align: center">Harga Pokok Produksi (HPP)</h3>
			</div>
			<div>
				<form action="">
					<div class="col-md-4 col-xs-12">
						<div style="background-color: aqua; padding: 4px;">
							<h4 style="text-align: center">Bahan Baku</h4>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						&nbsp;
					</div>
					<div class="col-md-4 col-xs-12">
						<div style="background-color: aqua; padding: 4px;">
							<h4 style="text-align: center">Harga</h4>
						</div>
					</div>
					<table class="table">
						<tbody>
							<tr>
								<td>
									<input type="text" name="bahan_baku[]" class="form-control">
								</td>
								<td>
									<input type="number" name="satuan[]" class="form-control">
								</td>
								<td>
									Gram
								</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" name="harga[]" class="form-control">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="bahan_baku[]" class="form-control">
								</td>
								<td>
									<input type="number" name="satuan[]" class="form-control">
								</td>
								<td>
									PCS
								</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" name="harga[]" class="form-control">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="bahan_baku[]" class="form-control">
								</td>
								<td>
									<input type="number" name="satuan[]" class="form-control">
								</td>
								<td>
									Gram
								</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" name="harga[]" class="form-control">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="bahan_baku[]" class="form-control">
								</td>
								<td>
									<input type="number" name="satuan[]" class="form-control">
								</td>
								<td>
									Karyawan
								</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" name="harga[]" class="form-control">
									</div>
								</td>
							</tr>
						</tbody>
						<tfoot>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<span class="label label-info">Biaya Total Produksi 1 PCS (HPP)</span>
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="biaya_total" class="form-control">
								</div>
							</td>
						</tr>
						</tfoot>
					</table>
					<div class="col-md-4 col-xs-12">
						<div style="background-color: aqua; padding: 4px;">
							<h4 style="text-align: center">Biaya Tambahan</h4>
						</div>
					</div>
					<table class="table">
						<tr>
							<td>
								<input type="text" name="biaya_tambahan" class="form-control">
							</td>
							<td>
								<input type="number" name="jumlah_biaya_tambahan" class="form-control">
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="subtotal_biaya_tambahan" class="form-control">
								</div>
							</td>
						</tr>
						<hr>
						<tfoot>
						<tr>
							<td>&nbsp;</td>
							<td>
								<span class="label label-info pull-right">Biaya Total Produksi 1 PCS (HPP)</span>
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="total_keseluruhan" class="form-control">
								</div>
							</td>
						</tr>
						</tfoot>
					</table>
				</form>
				@endif
			</div>
		</section>
		<script src="{{URL::to('js/jquery-3.2.1.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('bower_components/bootstrap/dist/js/bootstrap.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('plugins/dataTables/jquery.dataTables.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('plugins/dataTables/dataTables.bootstrap.js')}}"></script>
		<script type="text/javascript">
			$('#loginAkun').on('submit', function(e) {
					e.preventDefault();
					const data = $(this).serialize();
					// console.log(data);
					$.post('{{route('admin.loginAkun')}}',data, function(data) {
						const header = '<nav class="navbar navbar-inverse navbar-fixed-top"><div class="container"><div class="navbar-header"><button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="{{url('/')}}" class="navbar-brand">BikinProdukku.com</a></div><!-- Collection of nav links and other content for toggling --><div id="navbarCollapse" class="collapse navbar-collapse"><ul class="nav navbar-nav"><li class="dropdown dropdown-large"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Produk <b class="caret"></b></a></li><li><a href="{{route('faq')}}">Faq</a></li><li><a href="#">Lihat Pasar</a></li></ul><ul class="nav navbar-nav navbar-right"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a><ul class="dropdown-menu"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li></ul></div></div></nav>';
						if (data) {
							$('#header').empty();
							$('#header').append(header);
						}
					})
				})
		</script>
		<script>
		var canvas, ctx, bMouseIsDown = false, iLastX, iLastY,
		$save, $imgs,
		$convert, $imgW, $imgH,
		$sel;
		$('body').on('contextmenu', '#cvs', function(e){ return false; });
		var img2 = "";
		var imgT = "";
		var imgU = "";
		var xGmbr = 720;
		var yGmbr = 720;
		var yWarna = 0;
		var xULD = 0;
		var yULD = 0;
		var widthULD = 0;
		var heightULD = 0;
		var fkodewarna = "#ffffff";
		var imageLoader = document.getElementById('imageLoader');
		imageLoader.addEventListener('change', handleImage, false);
		function init () {
		canvas = document.getElementById('cvs');
		ctx = canvas.getContext('2d');
		draw();
		}
		function bind () {
		var link = document.createElement('a');
		link.innerHTML = 'download image';
		link.addEventListener('click', function(ev) {
		link.href = canvas.toDataURL();
		link.download = "mypainting.png";
		}, false);
		document.body.appendChild(link);
		}
		function gntgmbr(kodegambar,kodetext) {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		img2 = document.getElementById(kodegambar);
		imgT = document.getElementById(kodetext);
		canvas.width = xGmbr;
		canvas.height = xGmbr * img2.height / img2.width;
		yWarna = xGmbr * img2.height / img2.width;
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		window.onload = function() {
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function warna (kodewarna) {
		fkodewarna = kodewarna;
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,kodewarna);
		grd.addColorStop(1,kodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function downloadgmbr(){
		watermark();
		var button = document.getElementById('btDownload');
		var dataURL = canvas.toDataURL('image/png');
		button.href = dataURL;
		}
		function watermark(){
		ctx.font = "30px Arial";
		ctx.fillStyle = "black";
		ctx.fillText("bikkinprodukku.com", 0.4 * xGmbr,0.4 * xGmbr * img2.height / img2.width);
		}
		function handleImage(e){
		var reader = new FileReader();
		reader.onload = function(event){
		imgU = new Image();
		imgU.onload = function(){
		xULD = 0.4*xGmbr;
		yULD = 1/2*xGmbr * imgU.height / imgU.width;
		widthULD = 1/4*xGmbr;
		heightULD = 1/4*xGmbr * imgU.height / imgU.width;
		ctx.clearRect(0,0,canvas.width,canvas.height);
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		canvas.width = xGmbr;
		canvas.height = xGmbr * img2.height / img2.width;
		yWarna = xGmbr * img2.height / img2.width;
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		imgU.src = event.target.result;
		}
		reader.readAsDataURL(e.target.files[0]);
		}
		function fUp() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var ybaru = yULD-10;
		yULD = ybaru;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function fDown() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var ybaru = yULD+10;
		yULD = ybaru;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function fLeft() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var xbaru = xULD-10;
		xULD = xbaru;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function fRight() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var xbaru = xULD+10;
		xULD = xbaru;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function fplus() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var xbaru = widthULD+10;
		widthULD = xbaru;
		heightULD = widthULD * imgU.height / imgU.width;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		function fminus() {
		// Fill with gradient
		ctx.clearRect(0,0,canvas.width,canvas.height);
		var grd = ctx.createLinearGradient(0,0,600,400);
		grd.addColorStop(0,fkodewarna);
		grd.addColorStop(1,fkodewarna);
		// Fill with gradient
		ctx.fillStyle = grd;
		ctx.fillRect(0,0,xGmbr,yWarna);
		ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		var xbaru = widthULD-10;
		widthULD = xbaru;
		heightULD = widthULD * imgU.height / imgU.width;
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
		}
		onload = init;
		</script>
	</body>
</html>
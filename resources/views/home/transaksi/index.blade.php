<!DOCTYPE html>
<html>
	<head>
		<title>BikinProdukku.com</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="{{URL::to('bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{URL::to('bower_components/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{URL::to('plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('home/style.css')}}">
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
							<li id="li-faq"><a href="{{route('faq')}}">Faq</a></li>
							@else
							<li id="li-faq">&nbsp;</li>
							@endif
							<li><a href="#">Lihat Pasar</a></li>
						</ul>
						@if(!auth()->guard('pengguna')->check())
						<div id="ul-login">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#modal-register" data-toggle="modal">Daftar</a></li>
								<li><a href="#modal-login" data-toggle="modal">Login</a></li>
							</ul>
						</div>
						@else
						<div id="ul-login">
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
						</div>
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
		<section id="content" class="container-fluid" style="margin-top: 50px">
			<div class="row">
				<div class="col-md-2">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Gambar Produk
						</div>
						<div class="panel-body">
							<div class="scroll-area">
								@foreach($gambarProduk as $data)
								<div class="thumbnail">
									<a href="{{route('transaksi', [$kode_produk, $kode_gambar])}}">
										<img src="{{URL::to('upload/gambar-produk/'.$data['gambar_tampilan'])}}"  data-kode_gambar="{{$data['kode_gambar']}}" data-kode_produk="{{$kode_produk}}" class="gambar-produk" />
									</a>
								</div>
								@endforeach
								@foreach($gambarProduk2 as $data)
								<div class="thumbnail">
									<a href="{{route('transaksi', [$data['kode_produk'], $data['gambar_produk'][0]['kode_gambar']])}}">
										<img src="{{URL::to('upload/gambar-produk/'.$data['gambar_produk'][0]['gambar_tampilan'])}}"  data-kode_gambar="{{$data['gambar_produk'][0]['kode_gambar']}}" data-kode_produk="{{$data['kode_produk']}}" class="gambar-produk" />
									</a>
								</div>
								@endforeach
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
								<div id="gambar-warna">
								</div>
								<div class="pull-right">
									<a class="btn" download="my-file-name.png" id="btDownload" onclick="downloadgmbr()">Downlload Gambar</a>
									@if(!auth()->guard('pengguna')->check())
									<a class="btn btn-primary btn-lanjutkan" href="#modal-login" data-toggle="modal">Lanjutkan</a>
									@endif
								</div>
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
							<div class="scroll-area" id="gambar-template">
								@foreach($gambarTemplate as $data)
								<div class='thumbnail' id='btn-template'>
									<img src='{{URL::to('upload/gambar-template/'.$data['gambar_template'])}}' onclick="gntgmbr('g{{$loop->index}}','gT{{$loop->index}}','{{$data['kode_template']}}','{{$data['harga']}}')" id='g{{$loop->index}}'/>
									<img src='{{URL::to('upload/gambar-produk/'.$gambarProduk[0]['gambar_text'])}}' style='display:none;' id='gT{{$loop->index}}'/>
									<label>{{$data['sold_out'] == 1 ? "Tersedia" : "Terjual"}}</label><br>
									<label>Rp {{$data['harga']}}</label>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="khusus_modal">
		</section>
		<section style="margin-top: 10px;" id="biaya-produksi">
			<form action="{{route('transaksiProses', [$kode_produk, $kode_gambar])}}" id="frm-biaya" method="post" enctype="multipart/form-data">
				<div class="container-fluid" style="background-color: aqua">
					<h3 style="text-align: center">Harga Pokok Produksi (HPP)</h3>
				</div>
				<div style="margin-top: 10px" class="container">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Bahan Gambar</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-4 col-xs-12">
								<label>Upload Gambar Produk</label>
								<input type="file" name="gambar_produk_baru" class="form-control">
							</div>
							<div class="col-md-4 col-xs-12">
								<label>Upload Gambar Logo</label>
								<input type="file" name="gambar_logo" class="form-control">
							</div>
							<div class="col-md-4 col-xs-12">
								<label>Upload Gambar Sendiri</label>
								<input type="file" name="gambar_sendiri" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Isi Tagline</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<textarea class="form-control textarea" placeholder="Nama: Nama Produk Detail Produk : bla bla bla bla" name="tagline"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div style="margin-top: 10px">
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
							@foreach($bahanBaku as $keyBahan => $valueBahan)
							<tr>
								<td>
									<input type="text" name="bahan_baku[]" class="form-control" value="{{$valueBahan['nama_bahan']}}" readonly="">
								</td>
								<td>
									<input type="number" name="satuan[]" min="{{$valueBahan['minimal']}}" max="{{$valueBahan['maximal']}}" class="form-control" value="{{$valueBahan['berat']}}" id="satuan-{{$loop->index}}" onchange="ubahHarga('satuan-{{$loop->index}}','harga-{{$loop->index}}', '{{$valueBahan['berat']}}', '{{$valueBahan['harga']}}','{{$valueBahan['minimal']}}','{{$valueBahan['maximal']}}')">
								</td>
								<td>
									{{$valueBahan['satuan']['nama_satuan']}}
								</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">Rp.</div>
										<input type="text" name="harga[]" class="form-control" value="{{$valueBahan['harga']}}" id="harga-{{$loop->index}}" readonly="">
									</div>
								</td>
							</tr>
							@endforeach
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
									<input type="text" name="biaya_total" id="biaya_total" class="form-control" value="{{$totalAwal}}" onchange='ubahTotal()' readonly="">
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
								<input type="text" class="form-control" disabled="" value="Biaya Design">
							</td>
							<td>
								<input type="number" name="jumlah_biaya_tambahan" class="form-control" value="1" readonly="">
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="subtotal_biaya_tambahan" class="form-control" id="subtotal_biaya_tambahan" onchange='ubahTotal()' readonly="">
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
									<input type="text" id="total_keseluruhan" class="form-control" readonly="">
									<div class="input-group-addon">
										<button type="button" id="hitung_total">hitung total</button>
									</div>
								</div>
							</td>
						</tr>
						</tfoot>
					</table>
					@if(count($formulirPendaftaran) != 1)
					<div class="container">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Formulir Pendaftaran</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<tbody>
										<tr>
											<td>NIK</td>
											<td>:</td>
											<td>
												<input type="text" name="nik" class="form-control" required="">
											</td>
										</tr>
										<tr>
											<td>Nama Lengkap</td>
											<td>:</td>
											<td>
												<input type="text" name="nama_lengkap" class="form-control" required="">
											</td>
										</tr>
										<tr>
											<td>Tempat</td>
											<td>:</td>
											<td>
												<input type="text" name="tempat" class="form-control" required="">
											</td>
										</tr>
										<tr>
											<td>Tanggal Lahir</td>
											<td>:</td>
											<td>
												<input type="date" name="tgl_lahir" class="form-control" required="">
											</td>
										</tr>
										<tr>
											<td>Jenis Kelamin</td>
											<td>:</td>
											<td>
												<select class="form-control" required="" name="jenis_kelamin">
													<option value="pria">Pria</option>
													<option value="wanita">Wanita</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Status Perkawinan</td>
											<td>:</td>
											<td>
												<select class="form-control" name="status_perkawinan" required="">
													<option disabled="" selected="">-status perkawinan-</option>
													<option value="kawin">Kawin</option>
													<option value="belum kawin">Belum Kawin</option>
													<option value="janda">Janda</option>
													<option value="duda">Duda</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>pekerjaan</td>
											<td>:</td>
											<td>
												<input type="text" name="pekerjaan" class="form-control" required="">
											</td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td>:</td>
											<td>
												<textarea name="alamat" required="" class="form-control" id="pekerjaan" rows="3"></textarea>
											</td>
										</tr>
										<tr>
											<td>Foto</td>
											<td>:</td>
											<td>
												<input type="file" required="" name="foto" class="form-control">
											</td>
										</tr>
										<tr>
											<td>Motivasi Berbisnis</td>
											<td>:</td>
											<td>
												<input type="text" required="" name="motivasi_berbisnis" class="form-control">
											</td>
										</tr>
										<tr>
											<td>Hobi</td>
											<td>:</td>
											<td>
												<input type="text" required="" name="hobi" class="form-control">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					@endif
					<div class="col-md-8 col-md-offset-2">
						<button type="submit" class="btn btn-primary btn-block">Simpan Transaksi</button>
					</div>
				</form>
			</div>
		</section>
		<div class="clearfix"></div>
		<section style="margin-top: 20px">
			<div class="row" style="background-color: #e87874;">
				<div class="col-md-12">
					<div class="">
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
		</section>
		{{-- <script src="{{URL::to('js/jquery-3.2.1.js')}}" type="text/javascript"></script> --}}
		<script src="{{URL::to('bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('bower_components/bootstrap/dist/js/bootstrap.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('plugins/dataTables/jquery.dataTables.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('plugins/dataTables/dataTables.bootstrap.js')}}"></script>
		{{-- <script src="{{URL::to('js/transaksi.js')}}"></script> --}}
		<script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				@if(!auth()->guard('pengguna')->check())
					$('#biaya-produksi').hide();
				@else
					$('#biaya-produksi').show();
				@endif
				$('.textarea').wysihtml5();
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
			$('#hitung_total').on('click', function(e) {
				e.preventDefault();
				const subtotal_biaya_tambahan = $('#subtotal_biaya_tambahan').val();
				const biaya_total = $('#biaya_total').val();
				const hasil = (parseFloat(subtotal_biaya_tambahan) + parseFloat(biaya_total));
				$('#total_keseluruhan').val(hasil);
			})
			$('.gambar-produk').on('click', function() {
				var kode_gambar = $(this).data('kode_gambar');
				$.ajax({
					type:"GET",
					url:"{{route('getGambarTemplate', [$kode_produk, $kode_gambar])}}",
					data:"kode_gambar="+kode_gambar,
					success:function(data){
						// console.log(data);
						$('#gambar-template').empty();
						$.each(data[0], function(key, value) {
							const template = "<div class='thumbnail' id='btn-template'><img src='/upload/gambar-template/"+value.gambar_template+"' onclick=gntgmbr('g"+key+"','gT"+key+"','"+value.kode_template+"','"+value.harga+"') id='g"+key+"'/><img src='/upload/gambar-produk/"+data[1].gambar_text+"' style='display:none;' id='gT"+key+"'/><label>"+(value.sold_out == 1 ? 'Tersedia' : 'Terjual')+"</label><br><label>Rp "+value.harga+"</label></div>";
							$('#gambar-template').append(template);
						});
					}
				});
			});
			$('#loginAkun').on('submit', function(e) {
					e.preventDefault();
					const data = $(this).serialize();
					// console.log(data);
					$.post('{{route('admin.loginAkun')}}',data, function(data) {
		const login = '<ul class="nav navbar-nav navbar-right"><li class="dropdown"><a href="#x" class="dropdown-toggle" data-toggle="dropdown">'+data.username+'<b class="caret"></b></a><ul class="dropdown-menu"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li></ul>';
		const faq = '<li><a href="{{route('faq')}}">Faq</a></li>';
		if (data) {
		$('#div-faq').empty();
		$('#ul-login').empty();
		$('#btn-lanjutkan').hide();
		$('#biaya-produksi').show();
		$('#modal-login').modal('hide');
		$('#ul-login').append(login);
		$('#div-faq').append(faq);
		}
		})
		});
		});
		function ubahHarga(idsatuan,idharga, beratAwal, hargaAwal,minimal,maximal){
		console.log(idsatuan, idharga, beratAwal, hargaAwal);
		var satuan = document.getElementById(idsatuan).value;
		var harga = document.getElementById(idharga).value;
		if (parseFloat(satuan)<parseFloat(minimal)||parseFloat(satuan)>parseFloat(maximal)) {
									satuan=beratAwal;
									document.getElementById(idsatuan).value=beratAwal;
									}
									var subtotal = (satuan/beratAwal)*hargaAwal;
									var biaya_total = document.getElementById('biaya_total').value;
									biaya_total = (biaya_total - harga)+subtotal;
									document.getElementById('biaya_total').value = biaya_total;
									document.getElementById(idharga).value = subtotal;
									}
									function ubahTotal(){
									var biaya_total = document.getElementById("biaya_total").value;
									var subtotal_biaya_tambahan = document.getElementById("subtotal_biaya_tambahan").value;
									var grandTot = biaya_total + subtotal_biaya_tambahan;
									document.getElementById("total_keseluruhan").value = grandTot;
									}
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
			function gntgmbr(kodegambar,kodetext, kode_template, harga_template) {
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
			ctx.drawImage(imgT, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
			if (imgU!="") {
			ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
			}
			ctx.drawImage(img2, 0, 0, xGmbr, xGmbr * img2.height / img2.width);
			$('#subtotal_biaya_tambahan').val(harga_template);
			$.ajax({
				type:"GET",
				url:"{{route('getGambarWarna', [$kode_produk, $kode_gambar])}}",
				data:"kode_template="+kode_template,
				success:function(data){
					$('#gambar-warna').empty();
					$.each(data, function(key, value) {
							const template = "<button class='btn' style='background-color:"+value.hex_color+";color:"+value.hex_color+";margin-right:5px' onclick=warna('"+value.hex_color+"')>test</button>";
							$('#gambar-warna').append(template);
					});
				}
			});
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
			ctx.fillText("bikinprodukku.com", 0.4 * xGmbr,0.4 * xGmbr * img2.height / img2.width);
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
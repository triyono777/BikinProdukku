<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>BikinProdukku.com</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('home/style.css')}}">
		<link rel="stylesheet" href="{{URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">
		{{-- datatables --}}
		<link rel="stylesheet" type="text/css" href="{{URL::to('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('home/style.css')}}">
		@yield('customCss')
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		@include('home.templates.nav')
		<div class="container-fluid">
			@yield('content')
		</div>
		<div class="row" style="background-color: #e87874;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<img src="{{ asset('dist/img/logo.jpg') }}" alt="" width="200" height="200" style="margin:0 auto;
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
		<!-- jQuery -->
		<script src="{{URL::to('js/jquery-3.2.1.js')}}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		{{-- dataTables --}}
		<script src="{{URL::to('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{URL::to('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
		@yield('customJs')
		<script type="text/javascript">
			$(document).ready(function() {
				$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
				$('.textarea').wysihtml5();
				$('#datatables').DataTable();
			});
		</script>
		@if(Session::has('login'))
		<script type="text/javascript">
			alert('{{ Session::get('login') }} Silahkan login !');
		</script>
		@endif
	</body>
</html>
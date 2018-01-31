<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BikinProdukku.com</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Colo Shop Template">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/styles/bootstrap4/bootstrap.min.css')}}">
		<link href="{{URL::to('templates/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/plugins/OwlCarousel2-2.2.1/animate.css')}}">
		@yield('bootstrap3')
		<link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
		{{-- datatables --}}
		<link rel="stylesheet" type="text/css" href="{{URL::to('bower_components/datatables.net-bs/css/dataTables.bootstrap4.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/styles/main_styles.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('templates/styles/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::to('home/style.css')}}">
		@yield('customCss')
	</head>
	<body>
		<div class="super_container">
			@include('home.templates.nav2')
			@yield('content')
			<!-- Footer -->
			<footer class="footer-bs">
				<div class="row">
					<div class="col-md-3 footer-brand animated fadeInLeft">
						<img src="{{ asset('dist/img/logo.jpg') }}" width="70%" alt="" style="margin-bottom: 40px">
						<p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
						<p>© {{date("Y")}} BS3 UI Kit, All rights reserved</p>
					</div>
					<div class="col-md-3 footer-nav animated fadeInUp">
						<h4 style="color: white">Menu —</h4>
						<div class="col-md-12">
							<ul class="pages">
								<li><a href="#">Profil</a></li>
								<li><a href="#">Kebijakan Privasi</a></li>
								<li><a href="#">Program Mitra B-Pro</a></li>
								<li><a href="#">Reseller B-Pro</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 footer-social animated fadeInDown">
						<h4 style="color: white">Layanan Mitra B-Pro</h4>
						<ul>
							<li><a href="#">Jadwal Konsultasi</a></li>
							<li><a href="#">Kebijakan Privasi</a></li>
							<li><a href="#">Status Pembayaran</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-social animated fadeInRight">
						<h4 style="color: white">Follow Me</h4>
						<ul>
							<li><a href="#"><i class="fa fa-facebook-official"></i> Facebook</a></li>
							<li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
							<li><a href="#"><i class="fa fa-phone"></i> {{$kontak['kontak']}}</a></li>
						</ul>
					</div>
				</div>
			</footer>
		</div>
		<script src="{{URL::to('templates/js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{URL::to('templates/styles/bootstrap4/popper.js')}}"></script>
		<script src="{{URL::to('templates/styles/bootstrap4/bootstrap.min.js')}}"></script>
		<script src="{{URL::to('templates/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
		<script src="{{URL::to('templates/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
		<script src="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
		{{-- dataTables --}}
		<script src="{{URL::to('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{URL::to('bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{URL::to('templates/plugins/easing/easing.js')}}"></script>
		<script src="{{URL::to('templates/js/custom.js')}}"></script>
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
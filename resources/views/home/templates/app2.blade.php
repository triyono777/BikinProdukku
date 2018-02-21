<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BikinProdukku.com</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Colo Shop Template">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('favicon.ico') }}"/>
		{{-- select 2 --}}
   		<link rel="stylesheet" type="text/css" href="{{URL::to('bower_components/select2/dist/css/select2.min.css')}}">
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
			<footer class="footer-bs" style="background-color: #F7F416">
				<div class="row">
					<div class="col-md-3 footer-brand animated fadeInLeft">
						<img src="{{ asset('icon/png/29.png') }}" width="70%" alt="" style="margin-bottom: 40px">
						<p>BikinProdukku.com adalah situs web yang menyediakan jasa produksi makanan ringan yang memungkinkan Anda menjadi boss untuk brand Anda dengan memiliki produk makanan ringan sendiri tanpa pusing-pusing memikirkan proses produksi. </p>
						<p>© {{date("Y")}} <a href="http://bikinprodukku.com">bikinprodukku.com</a>, All rights reserved</p>
					</div>
					<div class="col-md-3 footer-nav animated fadeInUp">
						<h4 style="color:  #181818">Menu —</h4>
						<div class="col-md-12">
							<ul class="pages">
								<li><a href="{{route('tentang')}}">Profil</a></li>
{{-- 								<li><a href="#">Kebijakan Privasi</a></li>
								<li><a href="#">Program Mitra B-Pro</a></li>
								<li><a href="#">Reseller B-Pro</a></li> --}}
							</ul>
						</div>
					</div>
					<div class="col-md-3 footer-social animated fadeInDown">
						<h4 style="color:  #181818">Layanan Mitra B-Pro</h4>
						<ul>
							<li><a href="{{route('cs', 'jadwal')}}">Jadwal Konsultasi</a></li>
							{{-- <li><a href="#">Kebijakan Privasi</a></li> --}}
							<li><a href="{{route('akun.penggunaView')}}">Status Pembayaran</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-social animated fadeInRight">
						<h4 style="color:  #181818">Follow Me</h4>
						<ul>
							<li><a href="https://www.facebook.com/Bikin-Produkku-2003978293076920/" target="_blank"><i class="fa fa-facebook-official"></i> Facebook</a></li>
							<li><a href="https://www.instagram.com/bikinprodukku/" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
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
		{{-- select 2 --}}
      <script src="{{URL::to('bower_components/select2/dist/js/select2.min.js')}}"></script>
		<script src="{{URL::to('bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{URL::to('js/chart.js')}}"></script>
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
				$('.select2').select2();
				$('.select3').select2({
			        placeholder: 'pilih varian rasa',
			        allowClear: true
			     });
			});
		</script>
		@if(Session::has('login'))
		<script type="text/javascript">
			alert('{{ Session::get('login') }} Silahkan login !');
		</script>
		@endif
	</body>
</html>
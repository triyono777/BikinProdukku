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
		 <link rel="stylesheet" href="{{URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
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
		<!-- jQuery -->
		<script src="{{URL::to('js/jquery-3.2.1.js')}}"></script>

		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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
			});
		</script>
		@if(Session::has('login'))
		<script type="text/javascript">
			alert('{{ Session::get('login') }} Silahkan login !');
		</script>
		@endif
	</body>
</html>
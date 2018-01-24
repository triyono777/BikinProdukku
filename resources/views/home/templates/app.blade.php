<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BikinProdukku.com</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('home/style.css')}}">
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
		<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		@if(Session::has('login'))
		<script type="text/javascript">
			alert('{{ Session::get('login') }} Silahkan login !');
		</script>
		@endif
	</body>
</html>
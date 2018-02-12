@extends('home.templates.app2')

@section('content')
<div class="container" style="margin-top: 140px">
	<div class="row">
		<div class="col-xs-12 col-md-1"></div>
		<div class="col-xs-12 col-md-10">
			<div class="card">
				<div class="card-header">
					<h4 style="text-align: center;">{{$cs == 'beli-terpisah' ? 'Ingin Beli secara terpisah ?' : 'Ingin konsultasi gratis ?'}}</h4>
				</div>
				<div class="card-body">
					@if($cs == 'beli-terpisah')
					<h5>Anda dapat membeli produk kami secara terpisah. Misalnya :</h5>
					<ol>
						<li>Ingin desain kemasan saja</li>
						<li>Ingin paket tester produk yang tersedia</li>
						<li>Ingin beli produk kiloan</li>
					</ol>
					Hubungi Customer Service :
							<br>
							<i class="fa fa-phone"></i> {{$kontak['kontak']}}
					@else
					<h5>Hubungi Kami :</h5>
						<ul>
							<li><a href="#"><i class="fa fa-facebook-official"></i> Facebook</a></li>
							<li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
							<li><a href="#"><i class="fa fa-phone"></i> {{$kontak['kontak']}}</a></li>
						</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
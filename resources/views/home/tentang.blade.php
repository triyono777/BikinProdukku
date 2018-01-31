@extends('home.templates.app2')

@section('content')
<div class="container" style="margin-top: 140px">
	<div class="row">
		<div class="col-xs-12 col-md-1"></div>
		<div class="col-xs-12 col-md-10">
			<div class="card">
				<div class="card-header">
					<h4 style="text-align: center;">Tentang Kami</h4>
				</div>
				<div class="card-body">
					{!! $tentang['tentang'] !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('home.templates.app2')
@section('content')
<div class="container" style="margin-top: 150px">
	<h3 style="text-align: center;">FAQ</h3>
	<div class="card" id="faqAccordion" style="margin-bottom: 100px;border: 2px solid #cccccc; padding: 10px">
		@if($faq)
		@foreach($faq as $data)
		<div class="panel panel-default ">
			<div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{ $loop->index }}">
				<h4 class="panel-title">
				<a href="#" class="ing">Q: {{ strip_tags($data['question']) }} ?</a>
				</h4>
			</div>
			<div id="question{{ $loop->index }}" class="panel-collapse collapse" style="height: 0px;">
				<div class="panel-body">
					<h5><span class="label label-primary">Answer</span>  <span class="label label-info">{{ date('d-m-Y',strtotime($data['tanggal'])) }}</span></h5>
					@if(!$data['answer'])
						<span class="badge badge-danger">Belum ada Jawaban</span>
					@else
						@foreach($data['answer'] as $answer)
							<p>
								{!! $answer['answer'] !!}
							</p>
							<hr>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<hr>
		@endforeach
		@else
		<h4 align="center">Belum Ada pertanyaan...</h4>
		@endif
	</div>
	<!--/panel-group-->
	{{-- @if( auth()->guard('pengguna')->check() )
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form method="post" id="frm-faq">
				<div class="form-group">
					<label>Username</label>
					<input type="" name="" readonly="" class="form-control" value="{{ auth()->guard('pengguna')->user()->username }}">
				</div>
				<div class="form-group">
					<label>Pertanyaan</label>
					<textarea class="textarea form-control" name="question"></textarea>
				</div>
				<input type="submit" value="Simpan" class="btn btn-primary">
			</form>
		</div>
	</div>
	@endif --}}
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#frm-faq').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		$.post('{{route('faqPost')}}', data, function() {
			alert('pertanyaan anda sudah terkirim.');
		});
	})
</script>
@endsection
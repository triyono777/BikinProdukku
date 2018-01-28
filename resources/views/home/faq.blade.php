@extends('home.templates.app')
@section('content')
<div class="container ">
	<div class="panel-group" id="faqAccordion">
		@foreach($faq as $data)
		<div class="panel panel-default ">
			<div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{ $loop->index }}">
				<h4 class="panel-title">
				<a href="#" class="ing">Q: {{ $data['question'] }} ?</a>
				</h4>
			</div>
			<div id="question{{ $loop->index }}" class="panel-collapse collapse" style="height: 0px;">
				<div class="panel-body">
					<h5><span class="label label-primary">Answer</span>  <span class="label label-info">{{ date('d-m-Y',strtotime($data['tanggal'])) }}</span></h5>
					@foreach($data['answer'] as $answer)
						<p>
							{!! $answer['answer'] !!}
						</p>
						<hr>
					@endforeach
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!--/panel-group-->
	@if( auth()->guard('pengguna')->check() )
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form method="post" id="frm-faq">
				<div class="form-group">
					<label>Username</label>
					<input type="" name="" class="form-control" value="{{ auth()->guard('pengguna')->user()->username }}">
				</div>
				<div class="form-group">
					<label>Pertanyaan</label>
					<textarea class="textarea form-control" name="question"></textarea>
				</div>
				<input type="submit" value="Simpan" class="btn btn-primary">
			</form>
		</div>
	</div>
	@endif
</div>
@endsection
@section('customJs')
<script type="text/javascript">
	$('#frm-faq').on('submit', function(e) {
		e.preventDefault();
		const data = $(this).serialize();
		console.log(data);
		$.post('{{route('faqPost')}}', data, function() {
			alert('pertanyaan anda sudah terkirim.');
		});
	})
</script>
@endsection
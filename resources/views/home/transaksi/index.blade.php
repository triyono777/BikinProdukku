@extends('home.templates.app2')
@section('bootstrap3')
{{-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> --}}
@endsection
@section('customCss')
<style>
	.scroll-area{
	width:100%;
	height:480px;
	overflow-y:scroll;
	}
</style>
@endsection
@section('content')
<section id="content" class="container-fluid" style="margin-top: 150px">
	<div class="row">
		<div class="col-md-2">
			<div class="card">
				<div class="card-header">
					Gambar Produk
				</div>
				<div class="card-body">
					<div class="scroll-area">
						@foreach($gambarProduk as $data)
						<div class="thumbnail">
							<a href="{{route('transaksi', [$kode_produk, $kode_gambar])}}">
								<img src="{{URL::to('upload/gambar-produk/'.$data['gambar_tampilan'])}}"  data-kode_gambar="{{$data['kode_gambar']}}" data-kode_produk="{{$kode_produk}}" class="gambar-produk img-thumbnail" width="150" height="150" />
							</a>
						</div>
						@endforeach
						@foreach($gambarProduk2 as $data)
						<div class="thumbnail" style="margin-top: 5px">
							<a href="{{route('transaksi', [$data['kode_produk'], $data['gambar_produk'][0]['kode_gambar']])}}">
								<img src="{{URL::to('upload/gambar-produk/'.$data['gambar_produk'][0]['gambar_tampilan'])}}"  data-kode_gambar="{{$data['gambar_produk'][0]['kode_gambar']}}" data-kode_produk="{{$data['kode_produk']}}" class="gambar-produk img-thumbnail" width="150" height="150" />
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Canvas
				</div>
				<div class="card-body">
					<div>
						<canvas width="720" height="480" id="cvs"  style="display:block;margin:0 auto;"></canvas>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div id="gambar-warna">
						</div>
						<div class="pull-right">
							<a class="btn" download="my-file-name.png" id="btDownload" onclick="downloadgmbr()">Download Gambar</a>
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
			<div class="card">
				<div class="card-header">
					Gambar Templates
				</div>
				<div class="card-body">
					<div class="scroll-area" id="gambar-template">
						@foreach($gambarTemplate as $data)
						<div class='thumbnail' id='btn-template' style="border: 2px solid #868e96">
							<img src='{{URL::to('upload/gambar-template/'.$data['gambar_template'])}}' onclick="gntgmbr('g{{$loop->index}}','gT{{$loop->index}}','{{$data['kode_template']}}','{{$data['harga']}}')" id='g{{$loop->index}}' class="img-thumbnail" width="150" height="150" />
							<img src='{{URL::to('upload/gambar-produk/'.$gambarProduk[0]['gambar_text'])}}' style='display:none;' id='gT{{$loop->index}}'/>
							<label>&nbsp;{{$data['sold_out'] == 1 ? "Tersedia" : "Terjual"}}</label><br>
							<label>&nbsp;Rp. {{$data['harga']}}</label>
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
		{{csrf_field()}}
		<div class="container-fluid" style="background-color: aqua">
			<h3 style="text-align: center">Harga Pokok Produksi (HPP)</h3>
		</div>
		<div style="margin-top: 10px" class="container">
			<div class="card">
				<div class="panel-heading">
					<div class="card-header">
					Bahan Gambar
					</div>
				</div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-4">
						<label>Upload Gambar Produk<br>
						(Gambar Hasil Download)</label>
						<input type="file" name="gambar_produk_baru" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Upload Gambar Logo<br>
						(Gambar Logo Yang Diperlukan)</label>
						<input type="file" name="gambar_logo" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Upload Gambar Sendiri <br>
						(Jika anda memiliki desain sendiri)</label>
						<input type="file" name="gambar_sendiri" class="form-control">
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: 20px">
			<div class="card">
				<div class="card-header">
					Tagline
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Tagline</label>
						<input type="text" name="nama_tagline" class="form-control" id="nama_tagline">
					</div>
					<div class="form-group">
						<label>Isi Tagline</label>
						<textarea class="form-control textarea" placeholder="Nama: Nama Produk Detail Produk : bla bla bla bla" name="tagline" id="tagline"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 10px">
			<div class="row">
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
			</div>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						@foreach($bahanBaku as $keyBahan => $valueBahan)
						<tr>
							<td>
								<input type="text" name="bahan_baku[]" class="form-control bahan_baku" value="{{$valueBahan['nama_bahan']}}" readonly="">
							</td>
							<td>
								<input type="number" name="satuan[]" min="{{$valueBahan['minimal']}}" max="{{$valueBahan['maximal']}}" class="form-control satuan" value="{{$valueBahan['berat']}}" id="satuan-{{$loop->index}}" onchange="ubahHarga('satuan-{{$loop->index}}','harga-{{$loop->index}}', '{{$valueBahan['berat']}}', '{{$valueBahan['harga']}}','{{$valueBahan['minimal']}}','{{$valueBahan['maximal']}}')">
							</td>
							<td>
								{{$valueBahan['satuan']['nama_satuan']}}
								<input type="hidden" name="nama_satuan[]" value="{{$valueBahan['satuan']['nama_satuan']}}" class="nama_satuan">
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="harga[]" class="harga form-control" value="{{$valueBahan['harga']}}" id="harga-{{$loop->index}}" readonly="" >
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
			</div>
			<div class="row">
			<div class="col-md-4 col-xs-12">
				<div style="background-color: aqua; padding: 4px;">
					<h4 style="text-align: center">Biaya Tambahan</h4>
				</div>
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
							<input type="text" name="total_keseluruhan" id="total_keseluruhan" class="form-control" readonly="">
							<div class="input-group-addon">
								<button type="button" id="hitung_total">hitung total</button>
							</div>
						</div>
					</td>
				</tr>
				</tfoot>
			</table>
			<div class="container">
				<div class="card ">
					<div class="card-header">
						Rincian Produk
					</div>
					<div class="card-body" id="rincian">
						<span style="text-align: center;" class="btn btn-rincian btn-danger btn-md">Lihat Rincian Produk</span>
					</div>
				</div>
			</div>
			@if(count($formulirPendaftaran) == 0)
			<div class="container" id="formulir_pendaftaran1">
				<div class="card">
					<div class="card-header">
						Formulir Pendaftaran
					</div>
					<div class="card-body">
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
			<div class="container" id="formulir_pendaftaran">
				&nbsp;
			</div>
			@else
			<div class="container" id="formulir_pendaftaran">
				&nbsp;
			</div>
			@endif
			<input type="hidden" name="rincian_produk" id="rincian_produk">
			<div class="row">
				<div class="col-md-2"></div>
			<div class="col-md-8">
				<button type="submit" class="btn btn-primary btn-block">Simpan Transaksi</button>
			</div>
			</div>
		</form>
		<div class="container" style="margin-top: 100px">
			<div class="card">
				<div class="card-header">
					Proyeksi Keuangan
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Input Harga Jual</label>
						<div class="input-group">
							<input type="number" name="harga_jual" id="harga_jual" min="0" class="form-control">
							<div class="input-group-addon">/ Pcs (2000)</div>
						</div>
					</div>
					<div class="form-group">
						<label>Input Omset</label>
						<input type="number" name="omset" id="omset" min="0" class="form-control">
					</div>
					<a class="btn btn-primary pull-left" id="cek-proyeksi" onclick="addData()">Cek Proyeksi</a>
					<a class="btn btn-success pull-right" onclick="downloadchart()" download="my-chart-name.jpeg" id="btdlchart">Download Chart</a>
					<canvas id="myChart" width="400" height="150"></canvas>

					<br>
					<blockquote class="blockquote">
						Dengan target omset di bulan pertama sebesar Rp. <span id="bulan1">0</span>, kamu akan mendapatkan omset sebesar Rp. <span id="bulan12">0</span>, jika melakukan penjualan dengan kenaikan 30% setiap bulannya.
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('customJs')
<script type="text/javascript">
	$(document).ready(function() {
		@if(!auth()->guard('pengguna')->check())
			$('#biaya-produksi').hide();
		@else
			$('#biaya-produksi').show();
		@endif
	});
</script>
<script type="text/javascript">
	var chart = document.getElementById("myChart");
	var myChart = new Chart(chart, {
	type: 'bar',
	data: {
	labels: ["Bulan 1", "Bulan 2", "Bulan 3", "Bulan 3", "Bulan 4", "Bulan 5", "Bulan 6", "Bulan 7", "Bulan 8", "Bulan 9", "Bulan 10", "Bulan 11", "Bulan 12"],
	datasets: [{
	label: 'Proyeksi Keuangan',
	data: [],
	backgroundColor: [
	'rgba(255, 99, 132, 0.2)',
	'rgba(54, 162, 235, 0.2)',
	'rgba(255, 206, 86, 0.2)',
	'rgba(75, 192, 192, 0.2)',
	'rgba(153, 102, 255, 0.2)',
	'rgba(255, 159, 64, 0.2)',
	'rgba(255, 99, 132, 0.2)',
	'rgba(54, 162, 235, 0.2)',
	'rgba(255, 206, 86, 0.2)',
	'rgba(75, 192, 192, 0.2)',
	'rgba(153, 102, 255, 0.2)',
	'rgba(255, 159, 64, 0.2)'
	],
	borderColor: [
	'rgba(255,99,132,1)',
	'rgba(54, 162, 235, 1)',
	'rgba(255, 206, 86, 1)',
	'rgba(75, 192, 192, 1)',
	'rgba(153, 102, 255, 1)',
	'rgba(255, 159, 64, 1)',
	'rgba(255,99,132,1)',
	'rgba(54, 162, 235, 1)',
	'rgba(255, 206, 86, 1)',
	'rgba(75, 192, 192, 1)',
	'rgba(153, 102, 255, 1)',
	'rgba(255, 159, 64, 1)'
	],
	borderWidth: 1
	}]
	},
	options: {
	scales: {
	yAxes: [{
	ticks: {
	beginAtZero:true
	}
	}]
	}
	}
	});
	Chart.plugins.register({
	  beforeDraw: function(chartInstance) {
	    var ctx = chartInstance.chart.ctx;
	    ctx.fillStyle = "white";
	    ctx.fillRect(0, 0, chartInstance.chart.width, chartInstance.chart.height);
	  }
	});
	function addData() {
		var omset = $('#omset').val();
		var data = [];
		var hasillama = parseFloat(omset);
		data.push(Math.floor(omset));
		$('#bulan1').empty();
		const bulan1 = new Intl.NumberFormat().format(Math.floor(omset))
		$('#bulan1').text(bulan1);
		// var total = 0;
		for (var i = 0; i < 12; i++) {
			var hasilbaru = (hasillama * 30) / 100;
			var total = hasillama + hasilbaru;
			hasillama = total;
			data.push(Math.floor(total));
			if (i == 11) {
				$('#bulan12').empty();
				const bulan12 = new Intl.NumberFormat().format(Math.floor(total));
  				$('#bulan12').text(bulan12);
			}
		}
		myChart.data.datasets[0].data.pop();
		myChart.data.datasets[0].data = data;
		myChart.update();
	}
	function downloadchart(){
		var canvaschar = document.getElementById('myChart');
		var button = document.getElementById('btdlchart');
		var dataURL = canvaschar.toDataURL('image/jpeg');
		button.href = dataURL;
	}
	$(document).ready(function() {
	$('#harga_jual').on('change' , function() {
		const hargaJual = $(this).val();
		const hasil = parseFloat(hargaJual)*2000;
		$('#omset').val(hasil);
	});
	$('#omset').on('change', function() {
		const omset = parseFloat($(this).val());
		const hasil = omset / 2000;
		$('#harga_jual').val(hasil);
	});
	// $('#cek-proyeksi').on('click', function() {
		// 	var omset = $('#omset').val();
		// 	var data = [];
		// 	var hasillama = parseFloat(omset);
		// 	data.push(Math.round(omset));
		// 	// var total = 0;
		// 	for (var i = 0; i < 11; i++) {
			// 		var hasilbaru = (hasillama * 30) / 100;
			// 		var total = hasillama + hasilbaru;
			// 		hasillama = total;
			// 		data.push(Math.round(total));
		// 	}
		// 	MyChart.data.datasets.data.pop();
		// 	MyChart.data.datasets.data[0] = data;
	// });
	$('.btn-rincian').on('click', function(){
		var input = $('#frm-biaya');
		const nama_tagline = input.find("input[name='nama_tagline']").val();
		const isi_tagline = input.find("textarea#tagline").val();
		var bahan_baku = input.find("input[name='bahan_baku[]']").map(function() {return $(this).val();}).get();
		var jumlah = input.find("input[name='satuan[]']").map(function() {return $(this).val();}).get();
		var nama_satuan = input.find("input[name='nama_satuan[]']").map(function() {return $(this).val();}).get();
		var harga = input.find("input[name='harga[]']").map(function() {return $(this).val();}).get();
		const biaya_tambahan = input.find("input[name='subtotal_biaya_tambahan']").val();
		const total_keseluruhan = input.find("input[name='total_keseluruhan']").val();
		const rincian = '<div class="col-md-12">'+
							'<table class="table table-striped table-hover">'+
									'<tr>'+
											'<td>Nama Tagline</td>'+
											'<td>:</td>'+
											'<td>'+nama_tagline+'</td>'+
									'</tr>'+
									'<tr>'+
											'<td>Isi Tagline</td>'+
											'<td>:</td>'+
											'<td>'+isi_tagline+'</td>'+
									'</tr>'+
									'<tr>'+
											'<td>Bahan Baku</td>'+
											'<td>:</td>'+
											'<td>'+$.map(bahan_baku, function(value, index) {return value + ' ' + jumlah[index]  +  ' ' + nama_satuan[index] + ' ' + ' subtotal : ' + harga[index] + ', '})+'</td>'+
									'</tr>'+
									'<tr>'+
											'<td>Biaya Tambahan</td>'+
											'<td>:</td>'+
											'<td>'+biaya_tambahan+'</td>'+
									'</tr>'+
									'<tr>'+
											'<td>Total Biaya Keseluruhan</td>'+
											'<td>:</td>'+
											'<td> Rp. '+total_keseluruhan+'</td>'+
									'</tr>'+
							'</div>';
			$(this).remove();
			$('#rincian').append(rincian);
			$('#rincian_produk').val(rincian);
		})
		$('#hitung_total').on('click', function(e) {
			e.preventDefault();
			const subtotal_biaya_tambahan = $('#subtotal_biaya_tambahan').val();
			const biaya_total = $('#biaya_total').val();
			const hasil = (parseFloat(subtotal_biaya_tambahan) + parseFloat(biaya_total));
			$('#total_keseluruhan').val(hasil);
			const hargaJual = (hasil / 2000);
			$('#harga_jual').val(hargaJual);
			const hasil2 = (hargaJual*2000);
			$('#omset').val(hasil2);
		});
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
	const login = '<ul class="nav navbar-nav navbar-right"><li class="dropdown"><a href="#x" class="dropdown-toggle" data-toggle="dropdown">'+data[0].username+'<i class="fa fa-angle-down"></i></a><ul class="dropdown-menu"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li></ul>';
	const faq = '<a href="{{route('faq')}}">Faq</a>';
	const formulir = '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Formulir Pendaftaran</h3></div><div class="panel-body"><table class="table"><tbody><tr><td>NIK</td><td>:</td><td><input type="text" name="nik" class="form-control" required=""></td></tr><tr><td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama_lengkap" class="form-control" required=""></td></tr><tr><td>Tempat</td><td>:</td><td><input type="text" name="tempat" class="form-control" required=""></td></tr><tr><td>Tanggal Lahir</td><td>:</td><td><input type="date" name="tgl_lahir" class="form-control" required=""></td></tr><tr><td>Jenis Kelamin</td><td>:</td><td><select class="form-control" required="" name="jenis_kelamin"><option value="pria">Pria</option><option value="wanita">Wanita</option></select></td></tr><tr><td>Status Perkawinan</td><td>:</td><td><select class="form-control" name="status_perkawinan" required=""><option disabled="" selected="">-status perkawinan-</option><option value="kawin">Kawin</option><option value="belum kawin">Belum Kawin</option><option value="janda">Janda</option><option value="duda">Duda</option></select></td></tr><tr><td>pekerjaan</td><td>:</td><td><input type="text" name="pekerjaan" class="form-control" required=""></td></tr><tr><td>Alamat</td><td>:</td><td><textarea name="alamat" required="" class="form-control" id="pekerjaan" rows="3"></textarea></td></tr><tr><td>Foto</td><td>:</td><td><input type="file" required="" name="foto" class="form-control"></td></tr><tr><td>Motivasi Berbisnis</td><td>:</td><td><input type="text" required="" name="motivasi_berbisnis" class="form-control"></td></tr><tr><td>Hobi</td><td>:</td><td><input type="text" required="" name="hobi" class="form-control"></td></tr></tbody></table></div></div>';
					if (data) {
						$('#li-faq').empty();
						$('#ul-login').empty();
						$('.btn-lanjutkan').hide();
						$('#biaya-produksi').show();
						$('#modal-login').modal('hide');
						$('#ul-login').append(login);
						$('#li-faq').append(faq);
						$('#formulir_pendaftaran1').remove();
					}
					if (data[1] == null) {
						$('#formulir_pendaftaran1').hide();
						$('#formulir_pendaftaran').append(formulir);
					}
					alert('anda berhasil login');
					});
				});
		$('#frm-register').on('submit', function(e) {
				e.preventDefault();
				const data = $(this).serialize();
				// console.log(data);
				$.post('{{route('admin.registerPost')}}',data, function(data) {
	alert('Akun Anda Berhasil dibuat, Silahkan login !');
	if (data) {
	$('.btn-lanjutkan').hide();
	$('#biaya-produksi').show();
	$('#modal-register').modal('hide');
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
		@endsection
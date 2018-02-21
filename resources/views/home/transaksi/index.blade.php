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
<form action="{{route('transaksiProses', [$kode_produk, $kode_gambar])}}" id="frm-biaya" method="post" enctype="multipart/form-data">
<section id="content" class="container-fluid" style="margin-top: 80px">
	<div class="row">
		<div class="col-md-12" style="margin-bottom: 10px">
			<span class="pull-left"><a href="#modal-petunjuk" data-toggle="modal" class="btn btn-info">Petunjuk</a></span>
			<h2 align="center">Pilih Desain</h2>
		</div>
		<div class="modal fade" id="modal-petunjuk">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Petunjuk</h4>
					</div>
					<div class="modal-body">
						@foreach(range(1, 10) as $key => $value)
						<img src="{{URL::to('petunjuk/'.$key. '.jpg')}}" alt="" class="img-responsive img-thumbnail" width="720" height="auto">
						@endforeach
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="card">
				<div class="card-header bg-warning text-center">
					Jenis Produk
				</div>
				<div class="card-body">
					<div class="scroll-area">
						<div class="thumbnail">
							<a id="gP-0" href="{{route('transaksi', [$kode_produk, $kode_gambar])}}">
								<img src="{{URL::to('upload/gambar-produk/'.$gambarProduk['gambar_tampilan'])}}"  data-kode_gambar="{{$gambarProduk['kode_gambar']}}" data-kode_produk="{{$kode_produk}}" class="gambar-produk img-thumbnail" width="150" height="150" />
							</a>
						</div>
						@foreach($gambarProduk2 as $data)
						<div class="thumbnail" style="margin-top: 5px">
							<a id="gP{{$loop->index}}" href="{{route('transaksi', [$data['kode_produk'], $data['kode_gambar']])}}">
								<img src="{{URL::to('upload/gambar-produk/'.$data['gambar_tampilan'])}}"  data-kode_gambar="{{$data['kode_gambar']}}" data-kode_produk="{{$data['kode_produk']}}" class="gambar-produk img-thumbnail" width="150" height="150" />
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-warning text-center">
					Tampilan Desain
				</div>
				<div class="card-body">
					<div>
						<canvas id="cvs"  style="width: 100%; height: auto;display:block;margin:0 auto;"></canvas>
					</div>
					<div>
						<img src="" id="gambar_upload" alt="" style="display: block;margin: 0 auto">
					</div>
				</div>
				<div class="card-footer">
					{{-- <div id="gambar-warna">
					</div> --}}
					<a class="btn btn-success" download="my-file-name.png" id="btDownload" onclick="downloadgmbr()">Download Gambar</a>
					@if(!auth()->guard('pengguna')->check())
					<span class="pull-right"><a class="btn btn-primary btn-lanjutkan" href="#modal-login" data-toggle="modal">Lanjutkan ke HPP</a></span>
					@endif

						<div class="row">
							{{-- <div class="col-md-4">
								<label>Upload Design Logo Sendiri</label>
								<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="imageLoader"/>
								<br>
								<br>
							</div> --}}
							{{-- <div class="col-md-3">
								<label>Position Uploaded Design</label>
								<br>
								<button class="btn" onclick="fUp()"><span class="fa fa-arrow-up "></span></button>
								<button class="btn" onclick="fDown()"><span class="fa fa-arrow-down "></span></button>
								<button class="btn" onclick="fLeft()"><span class="fa fa-arrow-left "></span></button>
								<button class="btn" onclick="fRight()"><span class="fa fa-arrow-right "></span></button>
								<br>
								<br>
							</div>
							--}}					<div class="col-md-2"></div>
							<div class="col-md-8 text-center">
								<label>Upload Gambar<br>
								(Upload Gambar Desain yang sudah di download / upload desain anda sendiri)</label>
								<input type="file" name="gambar_sendiri" id="gambar_sendiri" class="form-control">
							</div>
							{{-- <div class="col-md-3">
								<label>Size Uploaded Design</label>
								<br>
								<button class="btn" onclick="fplus()"><span class="fa fa-plus "></span></button>
								<button class="btn" onclick="fminus()"><span class="fa fa-minus"></span></button>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card">
					<div class="card-header bg-warning text-center">
						Desain Kemasan
					</div>
					<div class="card-body">
						<div class="scroll-area" id="gambar-template">
							@foreach($gambarTemplate as $data)
							<div class='thumbnail' id='btn-template' style="border: 2px solid #868e96;margin-bottom: 5px">
								<img src='{{URL::to('upload/gambar-template/'.$data['gambar_template'])}}' onclick="gntgmbr('g{{$loop->index}}','gT{{$loop->index}}','{{$data['kode_template']}}','{{$data['harga']}}', '{{$data['sold_out'] == 1 ? 1 : 0}}')" id='g{{$loop->index}}' class="img-thumbnail" width="150" height="150"/>
								<img src='{{URL::to('watermark.png')}}' style='display:none;' id='gT{{$loop->index}}'/>
								{{-- <img src='{{URL::to('watermark.png')}}' style='display:none;' id='gT{{$loop->index}}'/> --}}
								<div style="text-align: center;">
									<label>&nbsp;{{$data['sold_out'] == 1 ? "Tersedia" : "Terjual"}}</label><br>
									<label>&nbsp;Rp. {{number_format($data['harga'])}}</label>
								</div>
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
		{{csrf_field()}}
		{{-- <div style="margin-top: 10px" class="container">
			<div class="card">
				<div class="panel-heading">
					<div class="card-header bg-warning">
						Bahan Gambar
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<label>Upload Gambar Produk<br>
							(Gambar Hasil Download)</label>
							<input type="file" name="gambar_produk_baru" id="gambar_produk_baru" class="form-control">
						</div> --}}
						{{-- <div class="col-md-4">
							<label>Upload Gambar Logo<br>
							(Gambar Logo Yang Diperlukan)</label>
							<input type="file" name="gambar_logo" class="form-control">
						</div> --}}
						{{-- <div class="col-md-4">
							<label>Upload Gambar Sendiri <br>
							(Jika anda memiliki desain sendiri)</label>
							<input type="file" name="gambar_sendiri" class="form-control">
						</div> --}}
					{{-- 		</div>
				</div>
			</div>
		</div> --}}
		<div class="container" style="margin-top: 20px">
			<div class="card">
				<div class="card-header bg-warning">
					Tagline
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Brand</label>
						<input type="text" name="nama_tagline" class="form-control" id="nama_tagline">
					</div>
					<div class="form-group">
						<label>Isi Tagline</label>
						<textarea class="form-control textarea" placeholder="Tuliskan penjelasan produk anda..." name="tagline" id="tagline"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="container" style="margin-top: 10px">
			<h3 style="text-align: center;margin: 30px 0px">Tentukan Harga Pokok Produksi (HPP) Per Pc</h3>
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="bg-warning" style="padding: 4px;">
						<h4 style="text-align: center">Bahan Baku</h4>
					</div>
				</div>
				<div class="col-md-2 col-xs-12">
					&nbsp;
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="bg-warning" style="padding: 4px;">
						<h4 style="text-align: center">&nbsp;</h4>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table" id="table-bahan">
					<tbody id="varian_table">
						@foreach($bahanBaku as $keyBahan => $valueBahan)
						<tr>
							<td>
								<input type="text" name="bahan_baku[]" class="form-control bahan_baku" value="{{$valueBahan['nama_bahan']}}" readonly="">
							</td>
							<td>
								<input type="number" name="satuan[]" min="{{$valueBahan['minimal']}}" max="{{$valueBahan['maximal']}}" class="form-control satuan" value="{{number_format($valueBahan['berat'])}}" id="satuan-{{$loop->index}}" onchange="ubahHarga('satuan-{{$loop->index}}','harga-{{$loop->index}}', '{{$valueBahan['berat']}}', '{{$valueBahan['harga']}}','{{$valueBahan['minimal']}}','{{$valueBahan['maximal']}}')">
							</td>
							<td>
								{{$valueBahan['satuan']['nama_satuan']}}
								<input type="hidden" name="nama_satuan[]" value="{{$valueBahan['satuan']['nama_satuan']}}" class="nama_satuan">
							</td>
							<td>
								<div class="input-group">
									<div class="input-group-addon">Rp.</div>
									<input type="text" name="harga[]" class="harga form-control" value="{{number_format($valueBahan['harga'])}}" id="harga-{{$loop->index}}" readonly="" >
								</div>
							</td>
						</tr>
						@endforeach
					<tr>
						<td>&nbsp;</td>
						<td colspan="2">
							<span class="label label-info"><b>Biaya Total Untuk 1 Pcs</b></span>
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-addon">Rp.</div>
								<input type="text" name="" id="biaya_total" class="form-control" value="{{number_format($totalAwal)}}" onchange='ubahTotal()' readonly="">
							</div>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="1">
							<select name="kemasan_id" id="kemasan_id" class="form-control">
								<option disabled selected>-Pilih Ukuran Kemasan-</option>
								@foreach($kemasan_id as $data)
								<option value="{{$data['id']}}" data-harga="{{$data['harga']}}">{{$data['ukuran']}}</option>
								@endforeach
							</select>
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-addon">Rp.</div>
								<input type="text" name="harga_kemasan" id="harga_kemasan" class="form-control" readonly="">
							</div>

						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<select class="form-control" id="minimal_pembelian" required="" name="minimal_pembelian">
								<option disabled="" selected="">Pilih Jumlah Pembelian</option>
								@foreach($minimal_pembelian as $data)
								<option value="{{$data['id']}}" data-jumlah_pembelian="{{$data['jumlah_pembelian']}}" data-satuan="{{$data['satuan']}}">{{$data['jumlah_pembelian'] . ' / ' . $data['satuan'] }}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="2">
							<select class="form-control select3" multiple="" id="varian_id">
								@foreach($varian as $data)
								<option class="sub-varian{{$data['id']}}" value="{{$data['id']}}" data-id="{{$data['id']}}" data-nama_varian="{{$data['nama_varian']}}">{{$data['nama_varian']}}</option>
								@endforeach
							</select>
						</td>
					</tr>
					</tbody>
					<tfoot>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><b>Total</b></td>
						<td>
							<div class="input-group">
								<div class="input-group-addon">Rp.</div>
								<input type="text" name="biaya_total" id="biaya_total2" class="form-control" readonly="">
							</div>
						</td>
					</tr>
					</tfoot>
				</table>
			</div>
			<div class="row" id="table-biaya-tambahan">
				<div class="col-md-6 col-xs-12">
					<div class="bg-warning" style="padding: 4px;">
						<h4 style="text-align: center">Biaya Tambahan</h4>
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
				</table>
			</div>
			<table class="table">
				<tr>
					@for($i= 0; $i < 15; $i++)
					<td>&nbsp;</td>
					@endfor
					<td>
						<span class="label label-info pull-right">Total Keseluruhan</span>
					</td>
					<td>
						<div class="input-group">
							<div class="input-group-addon">Rp.</div>
							<input type="text" name="total_keseluruhan" id="total_keseluruhan" class="form-control" readonly="">
							<div class="input-group-addon">
								<button type="button" class="btn btn-primary" id="hitung_total">hitung total</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
			<div class="container">
				<div class="card ">
					<div class="card-header bg-warning">
						Rincian Produk
					</div>
					<div class="card-body" id="rincian">
						<span style="text-align: center;" class="btn btn-rincian btn-danger btn-md">Lihat Rincian Produk</span>
					</div>
				</div>
			</div>
			{{-- @if(count($formulirPendaftaran) == 0)
			<div class="container" id="formulir_pendaftaran1">
				<div class="card">
					<div class="card-header bg-warning">
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
			@endif --}}
			<span id="input-varian"></span>
			<input type="hidden" name="rincian_produk" id="rincian_produk">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<button type="submit" class="btn btn-primary btn-block">saya produksi sekarang</button>
				</div>
			</div>
		</form>
		<div class="container" style="margin-top: 100px">
			<div class="card">
				<div class="card-header bg-warning">
					Proyeksi Keuangan
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Input Harga Jual</label>
								<div class="input-group">
									<input type="number" name="harga_jual" id="harga_jual" min="0" class="form-control">
									<div class="input-group-addon" id="label-pcs"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Harga Jual Rekomendasi</label>
								<div class="input-group">
									<input type="number" id="harga_jual2" min="0" class="form-control">
									<div class="input-group-addon" id="label-pcs2"></div>
								</div>
							</div>
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
						Dengan target omset di bulan pertama sebesar Rp. <span id="bulan1">0</span>, <br> kamu akan mendapatkan omset sebesar Rp. <span id="bulan12">0</span>,<br> jika melakukan penjualan dengan kenaikan 30% setiap bulannya.
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
	function numberFormat(nStr)
	{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
	x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
	}
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

	$('#varian_id').on('change', function(e) {
		$(".select3 option:selected").each(function() {
			var id = $(this).data('id');
			var nama_varian = $(this).data('nama_varian');
			if ($(id == id)) {
               $('.sub-varian'+id).remove();
               var row = '<tr><td>&nbsp;</td><td><input type="text" value="'+nama_varian+'" class="form-control pull-right" readonly=""><input type="hidden" name="id_varian[]" value="'+id+'"></td><td><input type="number" name="jumlah_varian[]" min="0" class="form-control pull-right" placeholder="jumlah varian rasa"></td><td><a class="btn btn-xs btn-danger hapus"><i class="fa fa-close pull-right"></i></a></td></tr>';
			   $('#varian_table').append(row);
            }

             $('.hapus').on('click', function() {
                var option = '<option class="sub-varian'+id+'" value="'+id+' data-nama_varian="'+nama_varian+'">'+nama_varian+'</option>';
                $('#varian_id').append(option);
                $(this).closest('tr').remove();
                return false;
            });
		});
	});



	$('#kemasan_id').on('change', function() {
		var kemasan_harga = $(this).find(':selected').data('harga');
		$('#harga_kemasan').val(numberFormat(kemasan_harga));
	})

		$('#table-biaya-tambahan').hide();
	$('#minimal_pembelian').on('change', function() {
		var total_bahan_baku = $('#biaya_total').val();
		var jumlah_minimal = $(this).find(':selected').data('jumlah_pembelian');
		var satuan = $(this).find(':selected').data('satuan');
		var kemasan_harga = $('#harga_kemasan').val().replace(/,/g, '');

		const hasil_kemasan = kemasan_harga*jumlah_minimal;
		const hasil = parseInt(total_bahan_baku.replace(/,/g, '')) * parseInt(jumlah_minimal)+hasil_kemasan;

		// console.log(total_bahan_baku, jumlah_minimal, hasil);
		$('#biaya_total2').val(numberFormat(hasil));
		$('#label-pcs').text('/ '+satuan+'');
		$('#label-pcs2').text('/ '+satuan+'');
	})
	$('#harga_jual').on('change' , function() {
		const hargaJual = $(this).val();
		const minimal_pembelian = $('#minimal_pembelian').find(':selected').data('jumlah_pembelian');
		const hasil = parseFloat(hargaJual)*minimal_pembelian;
		$('#omset').val(hasil);
	});
	$('#omset').on('change', function() {
		const omset = parseFloat($(this).val());
		const minimal_pembelian = $('#minimal_pembelian').find(':selected').data('jumlah_pembelian');
		const hasil = omset / minimal_pembelian;
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
		var table = $('#table-bahan');
		const nama_tagline = $("#nama_tagline").val();
		const isi_tagline = $("#tagline").val();
		var bahan_baku = table.find("input[name='bahan_baku[]']").map(function() {return $(this).val();}).get();
		var jumlah = table.find("input[name='satuan[]']").map(function() {return $(this).val();}).get();
		var nama_satuan = table.find("input[name='nama_satuan[]']").map(function() {return $(this).val();}).get();
		var harga = table.find("input[name='harga[]']").map(function() {return $(this).val();}).get();
		var hpp = numberFormat($('#biaya_total').val());
		const minimal_pembelian = $('#minimal_pembelian').find(':selected').data('jumlah_pembelian');
		const satuan = $('#minimal_pembelian').find(':selected').data('satuan');
		var biaya_tambahan = numberFormat($("#subtotal_biaya_tambahan").val());
		const total_keseluruhan = numberFormat($("#total_keseluruhan").val());
		const rincian = '<div class="col-md-12">'+
										'<table class="table table-striped table-hover">'+
															'<tr>'+
																				'<td>Jenis Produk</td>'+
																				'<td>:</td>'+
																				'<td>'+'{{$gambarProduk['produk']['nama_produk']}}'+'</td>'+
															'</tr>'+
															'<tr>'+
																				'<td>Nama Brand</td>'+
																				'<td>:</td>'+
																				'<td>'+nama_tagline+'</td>'+
															'</tr>'+
															'<tr>'+
																				'<td>Isi Tagline</td>'+
																				'<td>:</td>'+
																				'<td>'+isi_tagline+'</td>'+
															'</tr>'+
															'<tr>'+
																				'<td>Rincian Pesanan</td>'+
																				'<td>:</td>'+
																				'<td>'+$.map(bahan_baku, function(value, index) {return value + ' ' + jumlah[index]  +  ' ' + nama_satuan[index] +  ', '})+'</td>'+
															'</tr>'+
															'<tr>'+
																				'<td>HPP</td>'+
																				'<td>:</td>'+
																				'<td>'+hpp+'</td>'+
															'</tr>'+
															'<tr>'+
																				'<td>Jumlah Pesanan</td>'+
																				'<td>:</td>'+
																				'<td>'+minimal_pembelian+ ' / '+satuan+'</td>'+
															'</tr>'+
										'</div>';
						$(this).remove();
						$('#rincian').append(rincian);
						$('#rincian_produk').val(rincian);
					})
					$('#hitung_total').on('click', function(e) {
						e.preventDefault();
						const subtotal_biaya_tambahan = $('#subtotal_biaya_tambahan').val() ? $('#subtotal_biaya_tambahan').val().replace(/,/g, '') : 0;
						const biaya_total = $('#biaya_total2').val().replace(/,/g, '');
						const biaya_total1 = $('#biaya_total').val().replace(/,/g, '');
						var minimal_pembelian = $('#minimal_pembelian').find(':selected').data('jumlah_pembelian');
						const hasil = (parseFloat(subtotal_biaya_tambahan) + parseFloat(biaya_total));
						$('#total_keseluruhan').val(numberFormat(hasil));
						const hargaJual = (hasil / minimal_pembelian)*2;
						$('#harga_jual').val(hargaJual);
						const hargaJual2 = parseFloat(biaya_total1)*2;
						$('#harga_jual2').val(hargaJual2);
						const hasil2 = (hargaJual*minimal_pembelian);
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
				const login = '<li class="account"><a href="#">'+data[0].username+'<i class="fa fa-angle-down"></i></a><ul class="account_selection"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li>';
				// const login = '<ul class="nav navbar-nav navbar-right"><li class="dropdown"><a href="#x" class="dropdown-toggle" data-toggle="dropdown">'+data[0].username+'<i class="fa fa-angle-down"></i></a><ul class="dropdown-menu"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li></ul>';
				// const faq = '<a href="{{route('faq')}}">Faq</a>';
				// const formulir = '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Formulir Pendaftaran</h3></div><div class="panel-body"><table class="table"><tbody><tr><td>NIK</td><td>:</td><td><input type="text" name="nik" class="form-control" required=""></td></tr><tr><td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama_lengkap" class="form-control" required=""></td></tr><tr><td>Tempat</td><td>:</td><td><input type="text" name="tempat" class="form-control" required=""></td></tr><tr><td>Tanggal Lahir</td><td>:</td><td><input type="date" name="tgl_lahir" class="form-control" required=""></td></tr><tr><td>Jenis Kelamin</td><td>:</td><td><select class="form-control" required="" name="jenis_kelamin"><option value="pria">Pria</option><option value="wanita">Wanita</option></select></td></tr><tr><td>Status Perkawinan</td><td>:</td><td><select class="form-control" name="status_perkawinan" required=""><option disabled="" selected="">-status perkawinan-</option><option value="kawin">Kawin</option><option value="belum kawin">Belum Kawin</option><option value="janda">Janda</option><option value="duda">Duda</option></select></td></tr><tr><td>pekerjaan</td><td>:</td><td><input type="text" name="pekerjaan" class="form-control" required=""></td></tr><tr><td>Alamat</td><td>:</td><td><textarea name="alamat" required="" class="form-control" id="pekerjaan" rows="3"></textarea></td></tr><tr><td>Foto</td><td>:</td><td><input type="file" required="" name="foto" class="form-control"></td></tr><tr><td>Motivasi Berbisnis</td><td>:</td><td><input type="text" required="" name="motivasi_berbisnis" class="form-control"></td></tr><tr><td>Hobi</td><td>:</td><td><input type="text" required="" name="hobi" class="form-control"></td></tr></tbody></table></div></div>';
								if (data) {
									// $('#li-faq').empty();
									$('#ul-login').empty();
									$('.btn-lanjutkan').hide();
									$('#biaya-produksi').show();
									$('#modal-login').modal('hide');
									$('#ul-login').append(login);
									// $('#li-faq').append(faq);
									// $('#formulir_pendaftaran1').remove();
								}
								if (data[1] == null) {
									// $('#formulir_pendaftaran1').hide();
									// $('#formulir_pendaftaran').append(formulir);
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
				// console.log(idsatuan, idharga, beratAwal, hargaAwal);
				var satuan = document.getElementById(idsatuan).value;
				var harga = document.getElementById(idharga).value;
				if (parseFloat(satuan)<parseFloat(minimal)||parseFloat(satuan)>parseFloat(maximal)) {
						satuan=beratAwal;
						document.getElementById(idsatuan).value=beratAwal;
						}
						var subtotal = (satuan/beratAwal)*hargaAwal;
						var biaya_total = document.getElementById('biaya_total').value;
						// console.log(biaya_total, parseInt(biaya_total.replace(/,/g, '')), parseInt(harga.replace(/,/g, '')), subtotal);
						biaya_total = (parseInt(biaya_total.replace(/,/g, '')) - parseInt(harga.replace(/,/g, '')))+subtotal;
						document.getElementById('biaya_total').value = numberFormat(biaya_total);
						document.getElementById(idharga).value = numberFormat(subtotal);
						}
						function ubahTotal(){
						var biaya_total = document.getElementById("biaya_total").value;
						var subtotal_biaya_tambahan = document.getElementById("subtotal_biaya_tambahan").value;
						var grandTot = parseInt(biaya_total.replace(/,/g, '')) + parseInt(subtotal_biaya_tambahan.replace(/,/g, ''));
						document.getElementById("total_keseluruhan").value = numberFormat(grandTot);
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
		// var imageLoader = document.getElementById('imageLoader');
		// imageLoader.addEventListener('change', handleImage, false);
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
		function readURL(input) {
		if (input.files && input.files[0]) {
		var reader = new FileReader();
		$('#cvs').hide();
		reader.onload = function (e) {
		$('#gambar_upload').attr('src', e.target.result);
		$('#gambar_upload').attr('width', 720);
		$('#gambar_upload').attr('height', 480);
		}
		reader.readAsDataURL(input.files[0]);
		}
		}
		// $("#gambar_sendiri").change(function(){
		// $('#gambar_upload').show();
		// $('#gambar_produk_baru').attr('disabled', true);
		// $('#table-biaya-tambahan').hide();
		// readURL(this);
		// });
		function gntgmbr(kodegambar,kodetext, kode_template, harga_template, status) {
			if (status == 0) {
				alert('Desain sudah terjual, tidak dapat dipilih!');
				return false;
			}
			$('#cvs').show();
			$('#gambar_upload').hide();
			$('#gambar_produk_baru').attr('disabled', false);
			$('#table-biaya-tambahan').show();
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
		ctx.fillRect(0,0,canvas.width,canvas.height);

		ctx.drawImage(imgT, 0, 0, canvas.width, canvas.width * img2.height / img2.width);
		if (imgU!="") {
		ctx.drawImage(imgU,xULD,yULD,widthULD,heightULD);
		}
		ctx.drawImage(img2, 0, 0, canvas.width, canvas.width * img2.height / img2.width);
		$('#subtotal_biaya_tambahan').val(numberFormat(harga_template));
		$.ajax({
			type:"GET",
			url:"{{route('getGambarWarna', [$kode_produk, $kode_gambar])}}",
			data:"kode_template="+kode_template,
			success:function(data){
				$('#gambar-warna').empty();
				// $.each(data, function(key, value) {
								// 		const template = "<button class='btn' style='background-color:"+value.hex_color+";color:"+value.hex_color+";margin-right:5px' onclick=warna('"+value.hex_color+"')>test</button>";
								// 		$('#gambar-warna').append(template);
				// });
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
		// watermarks();
		watermarks();
		var button = document.getElementById('btDownload');
		var dataURL = canvas.toDataURL('image/png');
		button.href = dataURL;
		}
		function watermarks(){
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
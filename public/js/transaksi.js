$(document).ready(function() {
	$('.textarea').wysihtml5();
			$('#hitung_total').on('click', function(e) {
				e.preventDefault();
				const subtotal_biaya_tambahan = $('#subtotal_biaya_tambahan').val();
				const biaya_total = $('#biaya_total').val();
				const hasil = (parseFloat(subtotal_biaya_tambahan) + parseFloat(biaya_total));
				$('#total_keseluruhan').val(hasil);
			})
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
		const login = '<ul class="nav navbar-nav navbar-right"><li class="dropdown"><a href="#x" class="dropdown-toggle" data-toggle="dropdown">'+data.username+'<b class="caret"></b></a><ul class="dropdown-menu"><li><a href="{{route('akun.penggunaView')}}"> Dashboard</a></li><li><a href="{{route('akun.logout')}}">Logout</a></li></ul></li></ul>';
		const faq = '<li><a href="{{route('faq')}}">Faq</a></li>';

		if (data) {
		$('#div-faq').empty();
		$('#ul-login').empty();
		$('#btn-lanjutkan').hide();
		$('#biaya-produksi').show();
		$('#modal-login').modal('hide');
		$('#ul-login').append(login);
		$('#div-faq').append(faq);
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


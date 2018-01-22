<?php

// Home
Route::get('/', 'Home\HomeController@index')->name('home');
Route::post('/akun/login', 'Auth\AuthController@loginPost')->name('admin.penggunaLogin');


// Admin
// Auth Login
Route::get('/admin/login', 'Auth\AuthController@loginView')->name('admin.loginView');
Route::post('/admin/login', 'Auth\AuthController@loginPost')->name('admin.loginPost');
Route::post('/register', 'Auth\AuthController@registerPost')->name('admin.registerPost');

Route::group(['middleware' => 'pengguna'], function() {
	Route::group(['prefix' => 'akun'], function() {
	// pengguna login
		Route::get('/{username}&id={id}', 'Pengguna\PenggunaController@penggunaView')->name('akun.penggunaView');
		Route::get('/{username}&id={id}/transaksi-data', 'Pengguna\PenggunaController@penggunaTransaksiData')->name('akun.penggunaTransaksiData');
		Route::get('/{username}&id={id}/transaksi/detail', 'Pengguna\PenggunaController@penggunaTransaksiDetailView')->name('akun.penggunaTransaksiDetailView');
		Route::get('/{username}&id={id}/transaksi/detail/sub-transaksi&kode={kode_detail}', 'Pengguna\PenggunaController@penggunaSubTransaksiDetailView')->name('akun.penggunaSubTransaksiDetailView');
	});
});


Route::get('/admin/logout', 'Auth\AuthController@logout')->name('admin.logout');
Route::get('/akun/logout', 'Auth\AuthController@logout')->name('akun.logout');

Route::group(['middleware' => 'admin'], function() {
	Route::group(['prefix' => 'admin'], function() {
	// Admin Landing Page
	Route::get('/', 'Admin\AdminController@landingPageView')->name('admin.landingPageView');
	Route::get('/transaksi-data', 'Admin\AdminController@transaksiData')->name('admin.landingPageData');

	// Transaksi
	Route::get('/transaksi', 'Transaksi\TransaksiController@transaksiView')->name('admin.transaksiView');
	Route::get('/transaksi/data', 'Transaksi\TransaksiController@transaksiData')->name('admin.transaksiData');
	Route::post('/transaksi/update', 'Transaksi\TransaksiController@transaksiUpdate')->name('admin.transaksiUpdate');
	Route::post('/transaksi/delete', 'Transaksi\TransaksiController@transaksiDelete')->name('admin.transaksiDelete');

	// transaksi detail
	Route::get('/transaksi/detail/{id}', 'Transaksi\TransaksiController@transaksiDetailView')->name('admin.transaksiDetailView');
	Route::post('/transaksi/detail/{id}/statusUpdate', 'Transaksi\TransaksiController@transaksiStatusUpdate')->name('admin.transaksiStatusUpdate');
	Route::post('/transaksi/detail/{id}/trackingUpdate', 'Transaksi\TransaksiController@transaksiTrackingUpdate')->name('admin.transaksiTrackingUpdate');

	// sub transaksi detail
	Route::get('/transaksi/detail/{id}/sub-detail/{subId}', 'Transaksi\TransaksiController@transaksiSubDetailView')->name('admin.transaksiSubDetailView');

	// Satuan
	Route::get('/satuan', 'Satuan\SatuanController@satuanView')->name('admin.satuanView');
	Route::get('/satuan/data', 'Satuan\SatuanController@satuanData')->name('admin.satuanData');
	Route::post('/satuan/store', 'Satuan\SatuanController@satuanPost')->name('admin.satuanPost');
	Route::post('/satuan/update', 'Satuan\SatuanController@satuanUpdate')->name('admin.satuanUpdate');
	Route::post('/satuan/delete', 'Satuan\SatuanController@satuanDelete')->name('admin.satuanDelete');

	// Kategori
	Route::get('/kategori', 'Kategori\KategoriController@kategoriView')->name('admin.kategoriView');
	Route::get('/kategori/data', 'Kategori\KategoriController@kategoriData')->name('admin.kategoriData');
	Route::post('/kategori/store', 'Kategori\KategoriController@kategoriPost')->name('admin.kategoriPost');
	Route::post('/kategori/update', 'Kategori\KategoriController@kategoriUpdate')->name('admin.kategoriUpdate');
	Route::post('/kategori/delete', 'Kategori\KategoriController@kategoriDelete')->name('admin.kategoriDelete');

	// sub kategori
	Route::get('/sub-kategori', 'Kategori\SubKategoriController@subKategoriView')->name('admin.subKategoriView');
	Route::get('/sub-kategori/data', 'Kategori\SubKategoriController@subKategoriData')->name('admin.subKategoriData');
	Route::post('/sub-kategori/store', 'Kategori\SubKategoriController@subKategoriPost')->name('admin.subKategoriPost');
	Route::post('/sub-kategori/update', 'Kategori\SubKategoriController@subKategoriUpdate')->name('admin.subKategoriUpdate');
	Route::post('/sub-kategori/delete', 'Kategori\SubKategoriController@subKategoriDelete')->name('admin.subKategoriDelete');

	// produk
	Route::get('/produk', 'Produk\ProdukController@produkView')->name('admin.produkView');
	Route::get('/produk/detail/{id}', 'Produk\ProdukController@produkDetailView')->name('admin.produkDetailView');
	Route::get('/produk/data', 'Produk\ProdukController@produkData')->name('admin.produkData');
	Route::post('/produk/store', 'Produk\ProdukController@produkPost')->name('admin.produkPost');
	Route::post('/produk/update', 'Produk\ProdukController@produkUpdate')->name('admin.produkUpdate');
	Route::post('/produk/delete', 'Produk\ProdukController@produkDelete')->name('admin.produkDelete');

	// Gambar Produk
	Route::get('/produk/detail/{id}/gambar-produk/{id_gambar}', 'Produk\GambarProdukController@gambarProdukView')->name('admin.gambarProdukView');
	Route::post('/produk/detail/{id}/gambar-produk/post', 'Produk\GambarProdukController@gambarProdukPost')->name('admin.gambarProdukPost');
	Route::post('/produk/detail/{id}/gambar-produk/', 'Produk\GambarProdukController@gambarProdukPost')->name('admin.gambarProdukPost');
	Route::post('/produk/detail/{id}/gambar-produk/update', 'Produk\GambarProdukController@gambarProdukUpdate')->name('admin.gambarProdukUpdate');
	Route::post('/produk/detail/{id}/gambar-produk/delete', 'Produk\GambarProdukController@gambarProdukDelete')->name('admin.gambarProdukDelete');

	// Gambar Warna
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/detail/{id_gambar_template}/gambar-warna/post', 'Produk\GambarWarnaController@gambarWarnaPost')->name('admin.gambarWarnaPost');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/detail/{id_gambar_template}/gambar-warna/update', 'Produk\GambarWarnaController@gambarWarnaUpdate')->name('admin.gambarWarnaUpdate');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/detail/{id_gambar_template}/gambar-warna/delete', 'Produk\GambarWarnaController@gambarWarnaDelete')->name('admin.gambarWarnaDelete');

	// Gambar Template
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/post', 'Produk\GambarTemplateController@gambarTemplatePost')->name('admin.gambarTemplatePost');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/update', 'Produk\GambarTemplateController@gambarTemplateUpdate')->name('admin.gambarTemplateUpdate');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/delete', 'Produk\GambarTemplateController@gambarTemplateDelete')->name('admin.gambarTemplateDelete');
	Route::get('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-template/detail/{id_gambar_template}', 'Produk\GambarTemplateController@gambarTemplateDetail')->name('admin.gambarTemplateDetail');

	// bahan baku
	Route::get('/produk/detail/{id}/bahan-baku/data', 'Produk\BahanBakuController@bahanBakuData')->name('admin.bahanBakuData');
	Route::post('/produk/detail/{id}/bahan-baku/post', 'Produk\BahanBakuController@bahanBakuPost')->name('admin.bahanBakuPost');
	Route::post('/produk/detail/{id}/bahan-baku/', 'Produk\BahanBakuController@bahanBakuPost')->name('admin.bahanBakuPost');
	Route::post('/produk/detail/{id}/bahan-baku/update', 'Produk\BahanBakuController@bahanBakuUpdate')->name('admin.bahanBakuUpdate');
	Route::post('/produk/detail/{id}/bahan-baku/delete', 'Produk\BahanBakuController@bahanBakuDelete')->name('admin.bahanBakuDelete');

	// sub harga bahan baku
	Route::get('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}', 'Produk\SubHargaBahanBakuController@produkHargaBahanView')->name('admin.produkHargaBahanView');
	Route::get('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}/data', 'Produk\SubHargaBahanBakuController@subHargaBahanBakuData')->name('admin.subHargaBahanBakuData');
	Route::post('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}/post', 'Produk\SubHargaBahanBakuController@subHargaBahanBakuPost')->name('admin.subHargaBahanBakuPost');
	Route::post('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}/update', 'Produk\SubHargaBahanBakuController@subHargaBahanBakuUpdate')->name('admin.subHargaBahanBakuUpdate');
	Route::post('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}/delete', 'Produk\SubHargaBahanBakuController@subHargaBahanBakuDelete')->name('admin.subHargaBahanBakuDelete');

	// faq
	Route::get('/setting-website/faq', 'Faq\FaqController@faqView')->name('admin.faqView');
	Route::get('/setting-website/faq/data', 'Faq\FaqController@faqData')->name('admin.faqData');
	Route::post('/setting-website/faq/store', 'Faq\FaqController@faqPost')->name('admin.faqPost');
	Route::post('/setting-website/faq/update', 'Faq\FaqController@faqUpdate')->name('admin.faqUpdate');
	Route::post('/setting-website/faq/delete', 'Faq\FaqController@faqDelete')->name('admin.faqDelete');

	// Answer
	Route::get('/setting-website/faq/{id_faq}/answer', 'Answer\AnswerController@answerView')->name('admin.answerView');
	Route::get('/setting-website/faq/{id_faq}/answer/data', 'Answer\AnswerController@answerData')->name('admin.answerData');
	Route::post('/setting-website/faq/{id_faq}/answer/store', 'Answer\AnswerController@answerPost')->name('admin.answerPost');
	Route::post('/setting-website/faq/{id_faq}/answer/update', 'Answer\AnswerController@answerUpdate')->name('admin.answerUpdate');
	Route::post('/setting-website/faq/{id_faq}/answer/delete', 'Answer\AnswerController@answerDelete')->name('admin.answerDelete');

	// Tentang
	Route::get('/setting-website/tentang', 'Tentang\TentangController@tentangView')->name('admin.tentangView');
	Route::post('/setting-website/tentang', 'Tentang\TentangController@tentangPost')->name('admin.tentangPost');

	// Testimonial
	Route::get('/setting-website/testimonial', 'Testimonial\TestimonialController@testimonialView')->name('admin.testimonialView');
	Route::get('/setting-website/testimonial/data', 'Testimonial\TestimonialController@testimonialData')->name('admin.testimonialData');
	Route::post('/setting-website/testimonial/store', 'Testimonial\TestimonialController@testimonialPost')->name('admin.testimonialPost');
	Route::post('/setting-website/testimonial/update', 'Testimonial\TestimonialController@testimonialUpdate')->name('admin.testimonialUpdate');
	Route::post('/setting-website/testimonial/delete', 'Testimonial\TestimonialController@testimonialDelete')->name('admin.testimonialDelete');

	// Banner
	Route::get('/setting-website/banner', 'Banner\BannerController@bannerView')->name('admin.bannerView');
	Route::get('/setting-website/banner/data', 'Banner\BannerController@bannerData')->name('admin.bannerData');
	Route::post('/setting-website/banner/store', 'Banner\BannerController@bannerPost')->name('admin.bannerPost');
	Route::post('/setting-website/banner/update', 'Banner\BannerController@bannerUpdate')->name('admin.bannerUpdate');
	Route::post('/setting-website/banner/delete', 'Banner\BannerController@bannerDelete')->name('admin.bannerDelete');

	// kontak
	Route::get('/setting-website/kontak', 'Kontak\KontakController@kontakView')->name('admin.kontakView');
	Route::get('/setting-website/kontak/data', 'Kontak\KontakController@kontakData')->name('admin.kontakData');
	Route::post('/setting-website/kontak/store', 'Kontak\KontakController@kontakPost')->name('admin.kontakPost');
	Route::post('/setting-website/kontak/update', 'Kontak\KontakController@kontakUpdate')->name('admin.kontakUpdate');
	Route::post('/setting-website/kontak/delete', 'Kontak\KontakController@kontakDelete')->name('admin.kontakDelete');

	// lihat pasar
	Route::get('/lihat-pasar', 'LihatPasar\LihatPasarController@lihatPasarView')->name('admin.lihatPasarView');
	Route::get('/lihat-pasar/data', 'LihatPasar\LihatPasarController@lihatPasarData')->name('admin.lihatPasarData');
	Route::post('/lihat-pasar/store', 'LihatPasar\LihatPasarController@lihatPasarPost')->name('admin.lihatPasarPost');
	Route::post('/lihat-pasar/update', 'LihatPasar\LihatPasarController@lihatPasarUpdate')->name('admin.lihatPasarUpdate');
	Route::post('/lihat-pasar/delete', 'LihatPasar\LihatPasarController@lihatPasarDelete')->name('admin.lihatPasarDelete');

	// dialog proses
	Route::get('/dialog-proses', 'DialogProses\DialogProsesController@dialogProsesView')->name('admin.dialogProsesView');
	Route::get('/dialog-proses/data', 'DialogProses\DialogProsesController@dialogProsesData')->name('admin.dialogProsesData');
	Route::post('/dialog-proses/store', 'DialogProses\DialogProsesController@dialogProsesPost')->name('admin.dialogProsesPost');
	Route::post('/dialog-proses/update', 'DialogProses\DialogProsesController@dialogProsesUpdate')->name('admin.dialogProsesUpdate');
	Route::post('/dialog-proses/delete', 'DialogProses\DialogProsesController@dialogProsesDelete')->name('admin.dialogProsesDelete');
	});
});

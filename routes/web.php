<?php

// Admin
// Auth Login
Route::get('/login', 'Auth\AuthController@loginView')->name('admin.loginView');
Route::post('/login', 'Auth\AuthController@loginPost')->name('admin.loginPost');

Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');

// Route::group(['middleware' => 'admin'], function() {
	Route::group(['prefix' => 'admin'], function() {
	// Admin Landing Page
	Route::get('/', 'Admin\AdminController@landingPageView')->name('admin.landingPageView');

	// Transaksi
	Route::get('/transaksi', 'Transaksi\TransaksiController@transaksiView')->name('admin.transaksiView');
	Route::get('/transaksi/detail/{id}', 'Transaksi\TransaksiController@transaksiDetailView')->name('admin.transaksiDetailView');
	Route::get('/transaksi/detail/{id}/sub-detail/{subId}', 'Transaksi\TransaksiController@transaksiSubDetailView')->name('admin.transaksiSubDetailView');

	//Pengguna
	Route::get('/pengguna', 'Pengguna\PenggunaController@penggunaView')->name('admin.penggunaView');

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
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-warna/post', 'Produk\GambarWarnaController@gambarWarnaPost')->name('admin.gambarWarnaPost');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-warna/update', 'Produk\GambarWarnaController@gambarWarnaUpdate')->name('admin.gambarWarnaUpdate');
	Route::post('/produk/detail/{id}/gambar-produk/{id_gambar}/gambar-warna/delete', 'Produk\GambarWarnaController@gambarWarnaDelete')->name('admin.gambarWarnaDelete');

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

	// Answer
	Route::get('/setting-website/faq/{id_faq}', 'Answer\AnswerController@answerView')->name('admin.answerView');

	// Tentang
	Route::get('/setting-website/tentang', 'Tentang\TentangController@tentangView')->name('admin.tentangView');

	// Testimonial
	Route::get('/setting-website/testimonial', 'Testimonial\TestimonialController@testimonialView')->name('admin.testimonialView');

	// Banner
	Route::get('/setting-website/banner', 'Banner\BannerController@bannerView')->name('admin.bannerView');

	// kontak
	Route::get('/setting-website/kontak', 'Kontak\KontakController@kontakView')->name('admin.kontakView');

	// lihat pasar
	Route::get('/lihat-pasar', 'LihatPasar\LihatPasarController@lihatPasarView')->name('admin.lihatPasarView');

	// dialog proses
	Route::get('/dialog-proses', 'DialogProses\DialogProsesController@dialogProsesView')->name('admin.dialogProsesView');
});
// });

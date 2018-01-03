<?php

// Admin
Route::group(['prefix' => 'admin'], function() {
	// Admin Landing Page
	Route::get('/', 'Admin\AdminController@landingPageView')->name('admin.landingPageView');

	// Auth Login
	Route::get('/login', 'Auth\AuthController@loginView')->name('admin.loginView');
	Route::post('/login', 'Auth\AuthController@loginPost')->name('admin.loginPost');

	// Transaksi
	Route::get('/transaksi', 'Transaksi\TransaksiController@transaksiView')->name('admin.transaksiView');
	Route::get('/transaksi/detail/{id}', 'Transaksi\TransaksiController@transaksiDetailView')->name('admin.transaksiDetailView');
	Route::get('/transaksi/detail/{id}/sub-detail/{subId}', 'Transaksi\TransaksiController@transaksiSubDetailView')->name('admin.transaksiSubDetailView');

	//Pengguna
	Route::get('/pengguna', 'Pengguna\PenggunaController@penggunaView')->name('admin.penggunaView');

	// Satuan
	Route::get('/satuan', 'Satuan\SatuanController@satuanView')->name('admin.satuanView');

	// Kategori
	Route::get('/kategori', 'Kategori\KategoriController@kategoriView')->name('admin.kategoriView');

	// sub kategori
	Route::get('/sub-kategori', 'Kategori\SubKategoriController@subKategoriView')->name('admin.subKategoriView');

	// produk
	Route::get('/produk', 'Produk\ProdukController@produkView')->name('admin.produkView');
	Route::get('/produk/detail/{id}', 'Produk\ProdukController@produkDetailView')->name('admin.produkDetailView');

	// Gambar Produk
	Route::get('/produk/detail/{id}/gambar/{id_gambar}', 'Produk\ProdukController@gambarProdukView')->name('admin.gambarProdukView');

	// sub harga bahan baku
	Route::get('/produk/detail/{id}/harga-bahan-baku/{id_bahan_baku}', 'Produk\ProdukController@produkHargaBahanView')->name('admin.produkHargaBahanView');

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
});

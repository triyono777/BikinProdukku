<?php

namespace App\Http\Controllers\Produk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function produkView() {
    	return view('admin.produk.index');
    }

    public function produkDetailView($id) {
    	return view('admin.produk.detail');
    }

    public function gambarProdukView($id, $id_gambar) {
    	return view('admin.produk.gambar-produk');
    }

    public function produkHargaBahanView($id, $id_bahan_baku) {
    	return view('admin.produk.sub-harga-bahan');
    }
}

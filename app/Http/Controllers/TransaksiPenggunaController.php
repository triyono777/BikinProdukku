<?php

namespace App\Http\Controllers;

use App\Models\Kategori\Kategori;
use App\Models\Produk\GambarProduk;
use Illuminate\Http\Request;

class TransaksiPenggunaController extends Controller
{
    public function index($kode_produk) {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
    	$gambarProduk = GambarProduk::where('kode_produk', $kode_produk)->get()->toArray();
    	// dd($gambarProduk);
		return view('home.transaksi.index', compact('gambarProduk', 'kategori'));
    }
}


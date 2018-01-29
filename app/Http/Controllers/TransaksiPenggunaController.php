<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku\BahanBaku;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Kategori\Kategori;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\GambarTemplate;
use App\Models\Produk\GambarWarna;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;

class TransaksiPenggunaController extends Controller
{
    public function index($kode_produk, $kode_gambar) {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
    	$gambarProduk = GambarProduk::where('kode_produk', $kode_produk)->get()->toArray();
        $bahanBaku = BahanBaku::with(['satuan'])->where('kode_produk', $kode_produk)->get();
        // dd($bahanBaku);
        $gambarProduk2 = Produk::with('gambarProduk')->where('kode_produk', '!=', $kode_produk)->get()->toArray();
        $gambarTemplate = GambarTemplate::where('kode_gambar', $kode_gambar)->get()->toArray();
        if (auth()->guard('pengguna')->check()) {
            $id_user = auth()->guard('pengguna')->user()->id_user;
        }
        $id_user = '';
        $formulirPendaftaran = FormulirPendaftaran::where('id_user', $id_user)->first();
        $totalLoop = count($bahanBaku);
        $totalAwal = $bahanBaku->sum('harga');
		return view('home.transaksi.index', compact('gambarProduk', 'kategori', 'kode_produk', 'bahanBaku', 'totalLoop', 'totalAwal', 'gambarProduk2', 'kode_gambar', 'gambarTemplate', 'formulirPendaftaran'));
    }

    public function getGambarTemplate(Request $request) {
		$gambarTemplate = GambarTemplate::where('kode_gambar', $request['kode_gambar'])->get()->toArray();
		$gambarText = GambarProduk::select(['kode_gambar', 'gambar_text'])->where('kode_gambar', $request['kode_gambar'])->first();
		return response()->json([$gambarTemplate, $gambarText]);
    }

    public function getGambarWarna(Request $request) {
    	$gambarWarna = GambarWarna::where('kode_template', $request['kode_template'])->get()->toArray();
    	return response()->json($gambarWarna);
    }

    public function transaksiProses(Request $request) {
        dd($request->all());
    }
}


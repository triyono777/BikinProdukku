<?php

namespace App\Http\Controllers\Home;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use App\Models\Faq\Faq;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\SubKategori;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
        $banner = Banner::select('gambar as link')->where('tipe','video')->orderBy('id_banner','DESC')->first();
        
    	return view('home.index', compact('kategori','banner'));
    }

    public function kemasan($id_kategori)
    {
        $kategori = Kategori::with('subKategori')->get()->toArray();
        $subkategori = SubKategori::where('id_subkategori', $id_kategori)->first();
        $slider = Banner::get();

        $produk = Produk::with(['subkategori', 'gambarproduk'])->where('id_kategori', $id_kategori)->get()->toArray();
        return view('home.kemasan',compact('kategori','slider', 'produk', 'subkategori'));
    }

    public function faq() {
        $id_user = auth()->guard('pengguna')->user()->id_user;
        $kategori = Kategori::with('subKategori')->get()->toArray();
        $faq = Faq::with('answer')->where('id_user', $id_user)->get()->toArray();
        // dd($faq);
        return view('home.faq', compact('faq', 'kategori'));
    }

    public function faqPost(Request $request) {
        $id_user = auth()->guard('pengguna')->user()->id_user;
        $faq = Faq::create([
            'id_user' => $id_user,
            'status' => 0,
            'question' => $request['question'],
            'tanggal' => date('Y-m-d'),
        ]);

        return response()->json($faq);
    }
}

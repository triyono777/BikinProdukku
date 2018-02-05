<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\lihat;
use App\Models\Banner\Banner;
use App\Models\DialogProses\DialogProses;
use App\Models\Faq\Faq;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\SubKategori;
use App\Models\LihatPasar\LihatPasar;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\Produk;
use App\Models\Tentang\Tentang;
use App\Models\Testimonial\Testimonial;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
        $banner = Banner::select('gambar as link')->where('tipe','video')->orderBy('id_banner','DESC')->first();
        $dialogProses = DialogProses::get()->toArray();

    	return view('home.index', compact('kategori','banner', 'dialogProses'));
    }

    public function kemasan($id_kategori)
    {
        $kategori = Kategori::with('subKategori')->get()->toArray();
        $subkategori = SubKategori::where('id_subkategori', $id_kategori)->first();
        $slider = Banner::where('tipe', 'gambar')->get();

        $produk = Produk::with(['subkategori', 'gambarproduk'])->where('id_kategori', $id_kategori)->paginate(6);
        return view('home.kemasan',compact('kategori','slider', 'produk', 'subkategori'));
    }

    public function faq() {
        $id_user = auth()->guard('pengguna')->user()->id_user;
        $kategori = Kategori::with('subKategori')->get()->toArray();
        $faq = Faq::with('answer')->where('id_user', $id_user)->get()->toArray();
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

    public function tentang() {
        $tentang = Tentang::first();
        $kategori = Kategori::with('subKategori')->get()->toArray();

        return view('home.tentang', compact('tentang', 'kategori'));
    }

    public function testimonial() {
        $testimonial = Testimonial::with('pengguna')->where('status', 1)->get()->toArray();
        return view('home.testimonial', compact('testimonial'));
    }

    public function testimonialPost(Request $request) {
        $id_user = auth()->guard('pengguna')->user()->id_user;
        $testimonial = Testimonial::create([
            'id_user' => $id_user,
            'testimonial' => $request['testimonial']
        ]);
        return redirect()->back();
    }

    public function lihat_pasar() {
        $lihat_pasar = LihatPasar::get()->toArray();
        return view('home.lihat-pasar', compact('lihat_pasar'));
    }
}

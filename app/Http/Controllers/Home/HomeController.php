<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
    	return view('home.index', compact('kategori'));
    }

    public function kemasan()
    {
        $kategori = Kategori::with('subKategori')->get()->toArray();
        
        $slider = Banner::where('')->get();

        return view('home.kemasan',compact('kategori','slider'));
    }
}

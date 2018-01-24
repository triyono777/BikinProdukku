<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
    	return view('home.index', compact('kategori'));
    }
}

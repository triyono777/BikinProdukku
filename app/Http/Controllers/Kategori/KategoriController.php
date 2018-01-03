<?php

namespace App\Http\Controllers\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function kategoriView() {
    	return view('admin.kategori.index');
    }
}

<?php

namespace App\Http\Controllers\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubKategoriController extends Controller
{
    public function subKategoriView() {
    	return view('admin.kategori.sub-kategori');
    }
}

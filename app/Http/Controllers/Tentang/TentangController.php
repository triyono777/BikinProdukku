<?php

namespace App\Http\Controllers\Tentang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TentangController extends Controller
{
    public function tentangView() {
    	return view('admin.tentang.index');
    }
}

<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    public function penggunaView() {
    	return view('admin.pengguna.index');
    }

}

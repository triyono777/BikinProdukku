<?php

namespace App\Http\Controllers\Satuan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SatuanController extends Controller
{
    public function satuanView() {
    	return view('admin.satuan.index');
    }
}

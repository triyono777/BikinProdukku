<?php

namespace App\Http\Controllers\LihatPasar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LihatPasarController extends Controller
{
    public function lihatPasarView() {
    	return view('admin.lihatPasar.index');
    }
}

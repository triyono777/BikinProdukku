<?php

namespace App\Http\Controllers\Kontak;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontakController extends Controller
{
    public function kontakView() {
    	return view('admin.kontak.index');
    }
}

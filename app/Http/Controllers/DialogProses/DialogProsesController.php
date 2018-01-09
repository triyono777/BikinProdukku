<?php

namespace App\Http\Controllers\DialogProses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DialogProsesController extends Controller
{
    public function dialogProsesView() {
    	return view('admin.dialogProses.index');
    }
}

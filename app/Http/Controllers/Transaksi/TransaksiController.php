<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function transaksiView() {
    	return view('admin.transaksi.index');
    }

    public function transaksiDetailView($id) {
    	return view('admin.transaksi.detail');
    }

    public function transaksiSubDetailView($id, $subId) {
    	return view('admin.transaksi.sub-detail');
    }
}

<?php

namespace App\Http\Controllers\Tentang;

use App\Http\Controllers\Controller;
use App\Models\Tentang\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function tentangView() {
    	$tentang = Tentang::first();
    	return view('admin.tentang.index', compact('tentang'));
    }

    public function tentangPost(Request $request) {
    	$tentang = Tentang::where('id_tentang', $request['id_tentang'])->first();
    	if ($tentang == null) {
    		$tentang = Tentang::create([
    			'tentang' => $request['tentang']
    		]);

    		return response()->json($tentang);
    	}

    	$tentang->tentang = $request['tentang'];
    	$tentang->save();

    	return response()->json($tentang);
    }
}

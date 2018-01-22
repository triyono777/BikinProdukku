<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\GambarWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GambarWarnaController extends Controller
{
 	// Gambar Warna CRUD
 	public function gambarWarnaPost(Request $request, $kode_produk, $kode_gambar, $kode_template) {
        $gambarWarna = new GambarWarna;
        $gambarWarna->kode_template = $kode_template;
        $name = $request->file('gambar_warna');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/gambar-warna/' . $newName));
        $gambarWarna->gambar_warna = $newName;
        $gambarWarna->caption = $request['caption'];
        $gambarWarna->save();

        return redirect()->back();

    }

    public function gambarWarnaUpdate(Request $request, $kode_produk, $id_gambar, $kode_template) {
        $gambarWarna = GambarWarna::where('kode_warna', $request['id'])->first();
        $gambarWarna->kode_template = $kode_template;
        if ($request['gambar_warna']) {
        	// delete file
        	File::delete(public_path('upload/gambar-warna/'. $gambarWarna->gambar_warna));

        	$name = $request->file('gambar_warna');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/gambar-warna/' . $newName));
	        $gambarWarna->gambar_warna = $newName;
        }
        $gambarWarna->caption = $request['caption'];

        $gambarWarna->save();
        return redirect()->back();
    }

    public function gambarWarnaDelete(Request $request) {
        $gambarWarna = GambarWarna::where('kode_warna', $request['id'])->first();
        // delete file
    	File::delete(public_path('upload/gambar-warna/'. $gambarWarna->gambar_warna));
        $gambarWarna->delete();
        return response()->json($gambarWarna);
    }
}

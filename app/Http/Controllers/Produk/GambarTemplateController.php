<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\GambarTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GambarTemplateController extends Controller
{
    // Gambar Template CRUD
 	public function gambarTemplatePost(Request $request, $kode_produk, $kode_gambar) {
        $gambarTemplate = new GambarTemplate;
        $gambarTemplate->kode_gambar = $kode_gambar;
        $name = $request->file('gambar_template');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/gambar-template/' . $newName));
        $gambarTemplate->gambar_template = $newName;
        $gambarTemplate->sold_out = ($request['sold_out'] == 1 ? 1 : 0);
        $gambarTemplate->caption = $request['caption'];
        $gambarTemplate->save();

        return redirect()->back();

    }

    public function gambarTemplateUpdate(Request $request, $kode_produk, $kode_gambar) {
        $gambarTemplate = GambarTemplate::where('kode_template', $request['id'])->first();
        $gambarTemplate->kode_gambar = $kode_gambar;
        if ($request['gambar_template']) {
        	// delete file
        	File::delete(public_path('upload/gambar-template/'. $gambarTemplate->gambar_template));

        	$name = $request->file('gambar_template');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/gambar-template/' . $newName));
	        $gambarTemplate->gambar_template = $newName;
        }
        $gambarTemplate->sold_out = ($request['sold_out'] == 1 ? 1 : 0);
        $gambarTemplate->caption = $request['caption'];

        $gambarTemplate->save();
        return redirect()->back();
    }

    public function gambarTemplateDelete(Request $request) {
        $gambarTemplate = GambarTemplate::where('kode_template', $request['id'])->first();
        // delete file
    	File::delete(public_path('upload/gambar-template/'. $gambarTemplate->gambar_template));
        $gambarTemplate->delete();
        return response()->json($gambarTemplate);
    }
}

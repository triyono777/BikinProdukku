<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\GambarTemplate;
use App\Models\Produk\GambarWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class GambarProdukController extends Controller
{
	public function gambarProdukView($id, $id_gambar) {
        $kode_produk = $id;
        $id_gambar = $id_gambar;

        $gambarWarna = GambarWarna::orderBy('created_at', 'desc')->get()->toArray();
        $gambarTemplate = GambarTemplate::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.produk.gambar-produk', compact(['kode_produk', 'id_gambar', 'gambarWarna', 'gambarTemplate']));
    }

    // gambar produk CRUD
    public function gambarProdukPost(Request $request, $kode_produk) {
        $gambarProduk = new GambarProduk;
        $gambarProduk->kode_produk = $kode_produk;
        $name = $request->file('gambar_tampilan');
        $newName = time() . '.' . $name->getClientOriginalExtension();
        $image = Image::make($name);
        $image->encode('jpg', 75);
        $image->save(public_path('upload/gambar-produk/' . $newName));
        $gambarProduk->gambar_tampilan = $newName;
        $gambarProduk->caption = $request['caption'];
        $gambarProduk->save();

        return redirect()->back();

    }

    public function gambarProdukUpdate(Request $request, $kode_produk) {
        $gambarProduk = GambarProduk::where('kode_gambar', $request['id'])->first();
        $gambarProduk->kode_produk = $kode_produk;
        if ($request['gambar_tampilan']) {
        	// delete file
        	File::delete(public_path('upload/gambar-produk/'. $gambarProduk->gambar_tampilan));

        	$name = $request->file('gambar_tampilan');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/gambar-produk/' . $newName));
	        $gambarProduk->gambar_tampilan = $newName;
        }
        $gambarProduk->caption = $request['caption'];

        $gambarProduk->save();
        return redirect()->back();
    }

    public function gambarProdukDelete(Request $request) {
        $gambarProduk = GambarProduk::where('kode_gambar', $request['id'])->first(	);
        // delete file
    	File::delete(public_path('upload/gambar-produk/'. $gambarProduk->gambar_tampilan));
        $gambarProduk->delete();
        return response()->json($gambarProduk);
    }
}

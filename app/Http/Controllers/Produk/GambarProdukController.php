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

        // $gambarWarna = GambarWarna::orderBy('created_at', 'desc')->get()->toArray();
        $gambarTemplate = GambarTemplate::where('kode_gambar', $id_gambar)->orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.produk.gambar-produk', compact(['kode_produk', 'id_gambar', 'gambarTemplate']));
    }

    // gambar produk CRUD
    public function gambarProdukPost(Request $request, $kode_produk) {
        $gambarProduk = new GambarProduk;
        $gambarProduk->kode_produk = $kode_produk;
        // dd($request->file('gambar_tampilan'), $request->file('gambar_text'));
        $file_gambar_tampilan = $request->file('gambar_tampilan');
        $gambar_tampilan = time() . str_random(5) . '.' . $file_gambar_tampilan->getClientOriginalExtension();
        // $image = Image::make($file_gambar_tampilan);
        // $image = Storage::disk('local');
        // $image->encode('jpg', 75);
        $path = public_path('upload/gambar-produk/');
        $file_gambar_tampilan->move($path,$gambar_tampilan);
        $gambarProduk->gambar_tampilan = $gambar_tampilan;
        if ($request->file('gambar_text')) {
            $file_gambar_text = $request->file('gambar_text');

            $gambar_text = time() .str_random(5) . '.' . $file_gambar_text->getClientOriginalExtension();
            // $image = Image::make($file_gambar_text);
            // $image->encode('jpg', 75);
            $path = public_path('upload/gambar-produk/');
            $file_gambar_text->move($path,$gambar_text);
            $gambarProduk->gambar_text = $gambar_text;
        }

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

        	$file_gambar_tampilan = $request->file('gambar_tampilan');
	        $gambar_tampilan = time() . '.' . $file_gambar_tampilan->getClientOriginalExtension();
	        // $image = Image::make($file_gambar_tampilan);
	        $path = public_path('upload/gambar-produk/');
            $file_gambar_tampilan->move($path,$gambar_tampilan);
	        $gambarProduk->gambar_tampilan = $gambar_tampilan;
        }
        if ($request['gambar_text']) {
            // delete file
            File::delete(public_path('upload/gambar-produk/'. $gambarProduk->gambar_text));

            $file_gambar_text = $request->file('gambar_text');
            $gambar_text = time() . '.' . $file_gambar_text->getClientOriginalExtension();
            $image = Image::make($file_gambar_text);
            $path = public_path('upload/gambar-produk/');
            $file_gambar_text->move($path,$gambar_text);
            $gambarProduk->gambar_text = $gambar_text;
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

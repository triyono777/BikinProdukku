<?php

namespace App\Http\Controllers\LihatPasar;

use App\Http\Controllers\Controller;
use App\Models\LihatPasar\LihatPasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class LihatPasarController extends Controller
{
    public function lihatPasarView() {
    	$lihatPasar = LihatPasar::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.lihatPasar.index', compact('lihatPasar'));
    }

    // Lihat Pasar CRUD
    public function lihatPasarPost(Request $request) {
        $lihatPasar = new LihatPasar;
	        $name = $request->file('gambar');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/lihat-pasar/' . $newName));
        $lihatPasar->gambar = $newName;
        $lihatPasar->link = $request['link'];
        $lihatPasar->keterangan = $request['keterangan'];
        $lihatPasar->save();

        return redirect()->back();

    }

    public function lihatPasarUpdate(Request $request) {
        $lihatPasar = LihatPasar::where('id_pasar', $request['id'])->first();
        if ($request['gambar']) {
        	// delete file
        	File::delete(public_path('upload/lihat-pasar/'. $lihatPasar->gambar));

        	$name = $request->file('gambar');
	        $newName = time() . '.' . $name->getClientOriginalExtension();
	        $image = Image::make($name);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/lihat-pasar/' . $newName));
	        $lihatPasar->gambar = $newName;
        }
        $lihatPasar->link = $request['link'];
        $lihatPasar->keterangan = $request['keterangan'];

        $lihatPasar->save();
        return redirect()->back();
    }

    public function lihatPasarDelete(Request $request) {
        $lihatPasar = LihatPasar::where('id_pasar', $request['id'])->first(	);
        // delete file
    	File::delete(public_path('upload/lihat-pasar/'. $lihatPasar->gambar));
        $lihatPasar->delete();
        return response()->json($lihatPasar);
    }
}

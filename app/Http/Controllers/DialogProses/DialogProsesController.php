<?php

namespace App\Http\Controllers\DialogProses;

use App\Http\Controllers\Controller;
use App\Models\DialogProses\DialogProses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DialogProsesController extends Controller
{
    public function dialogProsesView() {
        $dialogProses = DialogProses::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.dialogProses.index',compact('dialogProses'));
    }

    // Lihat Pasar CRUD
    public function dialogProsesPost(Request $request) {
        $dialogProses = new DialogProses;
	        $name1 = $request->file('gambar');
	        $gambar = time() . str_random(5) .'.' . $name1->getClientOriginalExtension();
	        $image = Image::make($name1);
	        $image->encode('jpg', 75);
	        $image->save(public_path('upload/dialog-proses/' . $gambar));

            $name2 = $request->file('gambar_text');
            $gambar_text = time() . str_random(5) . '.' . $name2->getClientOriginalExtension();
            $image = Image::make($name2);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/dialog-proses/' . $gambar_text));

        $dialogProses->gambar = $gambar;
        $dialogProses->gambar_text = $gambar_text;

        // $dialogProses->keterangan = $request['keterangan'];
        $dialogProses->save();

        return redirect()->back();

    }

    public function dialogProsesUpdate(Request $request) {
        $dialogProses = DialogProses::where('id_dialog', $request['id'])->first();
        if ($request['gambar']) {
        	// delete file
        	File::delete(public_path('upload/dialog-proses/'. $dialogProses->gambar));

        	$name1 = $request->file('gambar');
            $gambar = time() . str_random(5) .'.' . $name1->getClientOriginalExtension();
            $image = Image::make($name1);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/dialog-proses/' . $gambar));
            $dialogProses->gambar = $gambar;
        }

        if ($request['gambar_text']) {
            // delete file
            File::delete(public_path('upload/dialog-proses/'. $dialogProses->gambar_text));

            $name2 = $request->file('gambar_text');
            $gambar_text = time() . str_random(5) . '.' . $name2->getClientOriginalExtension();
            $image = Image::make($name2);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/dialog-proses/' . $gambar_text));
            $dialogProses->gambar_text = $gambar_text;
        }

        // $dialogProses->keterangan = $request['keterangan'];

        $dialogProses->save();
        return redirect()->back();
    }

    public function dialogProsesDelete(Request $request) {
        $dialogProses = DialogProses::where('id_dialog', $request['id'])->first(	);
        // delete file
    	File::delete(public_path('upload/dialog-proses/'. $dialogProses->gambar));
        $dialogProses->delete();
        return response()->json($dialogProses);
    }
}

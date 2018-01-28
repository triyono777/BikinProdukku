<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function bannerView() {
    	$banner = Banner::orderBy('created_at', 'desc')->get()->toArray();
    	return view('admin.banner.index', compact('banner'));
    }

    // gambar produk CRUD
    public function bannerPost(Request $request) {
        $banner = new Banner;
        $banner->tipe = $request['tipe'];
        if ($request['tipe'] == 'gambar') {
            $name = $request->file('gambar');
            $newName = time() . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/banner/' . $newName));
            $banner->gambar = $newName;
        }else {
            $banner->gambar = $request['gambar'];
        }

        $banner->keterangan = $request['keterangan'];
        $banner->tipe_page = $request['tipe_page'];
        $banner->save();

        return redirect()->back();

    }

    public function bannerUpdate(Request $request) {
        $banner = Banner::where('id_banner', $request['id'])->first();
        $banner->tipe = $request['tipe'];
        if ($request['tipe'] == 'gambar') {
            if ($request['gambar']) {
            	// delete file
            	File::delete(public_path('upload/banner/'. $banner->gambar));

            	$name = $request->file('gambar');
    	        $newName = time() . '.' . $name->getClientOriginalExtension();
    	        $image = Image::make($name);
    	        $image->encode('jpg', 75);
    	        $image->save(public_path('upload/banner/' . $newName));
    	        $banner->gambar = $newName;
            }
        }else {
            $banner->gambar = $request['gambar'];
        }
        $banner->keterangan = $request['keterangan'];
        $banner->tipe_page = $request['tipe_page'];

        $banner->save();
        return redirect()->back();
    }

    public function bannerDelete(Request $request) {
        $banner = Banner::where('id_banner', $request['id'])->first(	);
        // delete file
    	File::delete(public_path('upload/banner/'. $banner->gambar));
        $banner->delete();
        return response()->json($banner);
    }
}

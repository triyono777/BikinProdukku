<?php

namespace App\Http\Controllers\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Pengguna\Pengguna;
use App\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function testimonialView() {
    	$pengguna = Pengguna::get()->toArray();
    	return view('admin.testimonial.index',compact('pengguna'));
    }

    public function testimonialData() {
    	$testimonial = Testimonial::with('pengguna')->orderBy('created_at', 'desc')->get()->toArray();

    	$datatables = DataTables::of($testimonial)
            ->editColumn('gambar', function($data) {
                return '<img class="img-thumbnail" src="/upload/testimonial/'.$data['gambar'].'" />';
            })
	    	->editColumn('id_user', function($data) {
    			return $data['pengguna']['nama'];
    		})
    		->editColumn('testimonial', function($data) {
    			return strip_tags($data['testimonial']);
    		})
            ->editColumn('status', function($data) {
                return '<span class="btn btn-xs btn-'.($data['status'] == 1 ? "success" : "danger").'">'.($data['status'] == 1 ? "konfirmasi" : "belum terkonfirmasi").'</span>';
            })
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_testi'].'" data-id_user="'.$data['id_user'].'" data-testimonial="'.$data['testimonial'].'" data-status="'.$data['status'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_testi'].'"><i class="fa fa-trash"></i></a>';
	        })
            ->rawColumns(['action', 'status', 'gambar'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function testimonialPost(Request $request) {
    	// $testimonial = Testimonial::create([
    	// 	'id_user' => $request['id_user'],
    	// 	'testimonial' => $request['testimonial'],
     //        'status' => 1
    	// ]);
        $testimonial = new Testimonial;
        $testimonial->id_user = $request['id_user'];
        $testimonial->testimonial = $request['testimonial'];
        $testimonial->status = 1;
        if ($request->file('gambar')) {
            $file_gambar_tampilan = $request->file('gambar');
            $gambar_tampilan = time() . str_random(10) . '.' . $file_gambar_tampilan->getClientOriginalExtension();
            $path = public_path('upload/testimonial/');
            $file_gambar_tampilan->move($path,$gambar_tampilan);
            $testimonial->gambar = $gambar_tampilan;
        }
        $testimonial->save();

    	return redirect()->back();
    }

    public function testimonialUpdate(Request $request) {
        $testimonial = Testimonial::where('id_testi', $request['id'])->first();
        $testimonial->testimonial = $request['testimonial'];
        $testimonial->status = $request['status'];
        if ($request->file('gambar')) {
            File::delete(public_path('upload/testimonial/'. $testimonial->gambar));
            $file_gambar_tampilan = $request->file('gambar');
            $gambar_tampilan = time() . str_random(10) . '.' . $file_gambar_tampilan->getClientOriginalExtension();

            $path = public_path('upload/testimonial/');
            $file_gambar_tampilan->move($path,$gambar_tampilan);
            $testimonial->gambar = $gambar_tampilan;
        }
        $testimonial->save();
    	return redirect()->back();
    }

    public function testimonialDelete(Request $request) {
    	$testimonial = Testimonial::where('id_testi', $request['id'])->delete();
    	return response()->json($testimonial);
    }
}

<?php

namespace App\Http\Controllers\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Pengguna\Pengguna;
use App\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;
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
	    	->editColumn('id_user', function($data) {
    			return $data['pengguna']['nama'];
    		})
    		->editColumn('testimonial', function($data) {
    			return strip_tags($data['testimonial']);
    		})
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_testi'].'" data-id_user="'.$data['id_user'].'" data-testimonial="'.$data['testimonial'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_testi'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function testimonialPost(Request $request) {
    	$testimonial = Testimonial::create([
    		'id_user' => $request['id_user'],
    		'testimonial' => $request['testimonial'],
    	]);

    	return response()->json($testimonial);
    }

    public function testimonialUpdate(Request $request) {
    	$testimonial = Testimonial::where('id_testi', $request['id'])->update([
    		'testimonial' => $request['testimonial'],
    	]);
    	return response()->json($testimonial);
    }

    public function testimonialDelete(Request $request) {
    	$testimonial = Testimonial::where('id_testi', $request['id'])->delete();
    	return response()->json($testimonial);
    }
}

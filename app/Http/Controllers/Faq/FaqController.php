<?php

namespace App\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq\Faq;
use App\Models\Pengguna\Pengguna;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function faqView() {
    	$user = Pengguna::get()->toArray();
    	return view('admin.faq.index', compact('user'));
    }

    // CRUD FAQ
    public function FaqData() {
    	$faq = Faq::with('user')->get()->toArray();

    	$datatables = DataTables::of($faq)
    		->editColumn('tanggal', function($data) {
    			return date('d-m-Y', strtotime($data['tanggal']));
    		})
    		->editColumn('id_user', function($data) {
    			return $data['user']['nama'];
    		})
    		->addColumn('action', function($data) {
	            return '
	            	<a href="'.route('admin.answerView', $data['id_faq']).'" class="btn btn-info"><i class=" fa fa-eye"></i></a>
					<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
					data-id="'.$data['id_faq'].'"
					data-question="'.$data['question'].'"
					data-tanggal="'.date('d/m/Y', strtotime($data['tanggal'])).'"
					><i class="fa fa-edit"></i></a>
					<a href="#!" class="btn btn-danger delete"
					data-id="'.$data['id_faq'].'"
					><i class=" fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function FaqPost(Request $request) {
    	$faq = Faq::create([
    		'id_user' => $request['id_user'],
    		'question' => $request['question'],
    		'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
    	]);

    	return response()->json($faq);
    }

    public function FaqUpdate(Request $request) {
    	$faq = Faq::where('id_faq', $request['id'])->update([
    		'question' => $request['question'],
    		'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
    	]);
    	return response()->json($faq);
    }

    public function FaqDelete(Request $request) {
    	$faq = Faq::where('id_faq', $request['id'])->delete();
    	return response()->json($faq);
    }
}

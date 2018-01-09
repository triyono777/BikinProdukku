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

    public function FaqData() {
    	$faq = Faq::with('user')->get()->toArray();

    	$datatables = DataTables::of($faq)
    		->editColumn('tanggal', function($data) {
    			return date('d-M-Y', strtotime($data['tanggal']));
    		})
    		->editColumn('id_user', function($data) {
    			return $data['user']['nama'];
    		})
    		->addColumn('action', function($data) {
	            return '
	            	<a href='.route('admin.answerView', 1).'" class="btn btn-info"><i class=" fa fa-eye"></i></a>
					<a href="#!" class="btn btn-warning"><i class=" fa fa-edit"></i></a>
					<a href="#!" class="btn btn-danger"><i class=" fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function FaqPost(Request $request) {
    	$faq = Faq::create([
    		'nama_satuan' => $request['nama_satuan'],
    		'berat' => $request['berat'],
    	]);

    	return response()->json($faq);
    }

    public function FaqUpdate(Request $request) {
    	$faq = Faq::where('id_satuan', $request['id'])->update([
    		'nama_satuan' => $request['nama_satuan'],
    		'berat' => $request['berat'],
    	]);
    	return response()->json($faq);
    }

    public function FaqDelete(Request $request) {
    	$faq = Faq::where('id_satuan', $request['id'])->delete();
    	return response()->json($faq);
    }
}

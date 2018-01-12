<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Models\Answer\Answer;
use App\Models\Pengguna\Pengguna;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AnswerController extends Controller
{
    public function answerView($id_faq) {
    	$user = Pengguna::get()->toArray();
    	return view('admin.answer.index', compact(['id_faq', 'user']));
    }

    // CRUD Answer
    public function answerData() {
    	$answer = Answer::with('user')->get()->toArray();

    	$datatables = DataTables::of($answer)
    		->editColumn('id_user', function($data) {
    			return $data['user']['nama'];
    		})
    		->editColumn('tanggal', function($data) {
    			return date('d-m-Y', strtotime($data['tanggal']));
    		})
    		->editColumn('status', function($data) {
    			return '<span class="btn btn-xs '.($data['jabatan'] == 'terjawab' ? "btn-success" : "btn-danger").'">'.$data['jabatan'].'</span>';
    		})
    		->addColumn('action', function($data) {
	            return '
	            	<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
					data-id="'.$data['id_answer'].'"
					data-jabatan="'.$data['jabatan'].'"
					data-answer="'.$data['answer'].'"
					data-tanggal="'.date('d/m/Y', strtotime($data['tanggal'])).'"
	            	><i class=" fa fa-edit"></i></a>
					<a href="#!" class="btn btn-danger delete" data-id="'.$data['id_answer'].'"><i class=" fa fa-trash"></i></a>';
	        })
	        ->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function answerPost(Request $request, $id_faq) {
    	$answer = Answer::create([
    		'id_faq' => $id_faq,
    		'id_user' => $request['id_user'],
    		'answer' => $request['answer'],
    		'jabatan' => 'belum',
    		'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
    	]);

    	return response()->json($answer);
    }

    public function answerUpdate(Request $request) {
    	$answer = Answer::where('id_answer', $request['id'])->update([
    		'answer' => $request['answer'],
    		'jabatan' => 'terjawab',
    		'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
    	]);
    	return response()->json($answer);
    }

    public function answerDelete(Request $request) {
    	$answer = Answer::where('id_answer', $request['id'])->delete();
    	return response()->json($answer);
    }
}

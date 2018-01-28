<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Models\Answer\Answer;
use App\Models\Faq\Faq;
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
    public function answerData($id_faq) {
    	$answer = Answer::with('user')->where('id_faq',$id_faq)->get()->toArray();

    	$datatables = DataTables::of($answer)
    		->editColumn('id_user', function($data) {
    			return $data['user']['nama'];
    		})
            ->editColumn('answer', function($data) {
                return strip_tags(str_limit($data['answer'],100,' ...'));
            })
    		->editColumn('tanggal', function($data) {
    			return date('d-m-Y', strtotime($data['tanggal']));
    		})
    		->addColumn('action', function($data) {
	            return '
	            	<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
					data-id="'.$data['id_answer'].'"
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
        $data_faq = Faq::where('id_faq', $id_faq)->first();
    	$answer = Answer::create([
    		'id_faq' => $id_faq,
    		'id_user' => $data_faq['id_user'],
    		'answer' => $request['answer'],
    		'tanggal' => date('Y-m-d'),
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

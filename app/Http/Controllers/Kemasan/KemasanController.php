<?php

namespace App\Http\Controllers\Kemasan;

use App\Http\Controllers\Controller;
use App\Models\Kemasan\Kemasan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KemasanController extends Controller
{
    public function kemasanView() {
    	return view('admin.kemasan.index');
    }

    public function kemasanData() {
    	$kemasan = Kemasan::get()->toArray();

    	$datatables = DataTables::of($kemasan)
    		->editColumn('status', function($data) {
    			return '<span class="btn btn-xs btn-'.($data['status'] == 1 ? 'success' : 'danger').'">'.($data['status'] == 1 ? 'Tersedia' : 'Tidak Tersedia').'</span>';
    		})
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id'].'" data-ukuran="'.$data['ukuran'].'" data-harga="'.$data['harga'].'" data-status="'.$data['status'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function kemasanPost(Request $request) {
    	$kemasan = Kemasan::create([
    		'ukuran' => $request['ukuran'],
    		'harga' => $request['harga'],
    		'status' => $request['status'],
    	]);

    	return response()->json($kemasan);
    }

    public function kemasanUpdate(Request $request) {
    	$kemasan = Kemasan::where('id', $request['id'])->update([
    		'ukuran' => $request['ukuran'],
    		'harga' => $request['harga'],
    		'status' => $request['status'],
    	]);
    	return response()->json($kemasan);
    }

    public function kemasanDelete(Request $request) {
    	$kemasan = Kemasan::where('id', $request['id'])->delete();
    	return response()->json($kemasan);
    }
}

<?php

namespace App\Http\Controllers\Satuan;

use App\Http\Controllers\Controller;
use App\Models\Satuan\Satuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SatuanController extends Controller
{
    public function satuanView() {
    	return view('admin.satuan.index');
    }

    public function satuanData() {
    	$satuan = Satuan::get()->toArray();

    	$datatables = DataTables::of($satuan)
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_satuan'].'" data-nama="'.$data['nama_satuan'].'" data-berat="'.$data['berat'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_satuan'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function satuanPost(Request $request) {
    	$satuan = Satuan::create([
    		'nama_satuan' => $request['nama_satuan'],
    		'berat' => $request['berat'],
    	]);

    	return response()->json($satuan);
    }

    public function satuanUpdate(Request $request) {
    	$satuan = Satuan::where('id_satuan', $request['id'])->update([
    		'nama_satuan' => $request['nama_satuan'],
    		'berat' => $request['berat'],
    	]);
    	return response()->json($satuan);
    }

    public function satuanDelete(Request $request) {
    	$satuan = Satuan::where('id_satuan', $request['id'])->delete();
    	return response()->json($satuan);
    }
}

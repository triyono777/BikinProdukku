<?php

namespace App\Http\Controllers\VarianRasa;

use App\Http\Controllers\Controller;
use App\Models\Varian\VarianRasa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VarianRasaController extends Controller
{
    public function varianRasaView() {
    	return view('admin.varian.index');
    }

    public function varianRasaData() {
    	$varianRasa = VarianRasa::get()->toArray();

    	$datatables = DataTables::of($varianRasa)
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id'].'" data-nama_varian="'.$data['nama_varian'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function varianRasaPost(Request $request) {
    	$varianRasa = VarianRasa::create([
    		'nama_varian' => $request['nama_varian'],
    	]);

    	return response()->json($varianRasa);
    }

    public function varianRasaUpdate(Request $request) {
    	$varianRasa = VarianRasa::where('id', $request['id'])->update([
    		'nama_varian' => $request['nama_varian'],
    	]);
    	return response()->json($varianRasa);
    }

    public function varianRasaDelete(Request $request) {
    	$varianRasa = VarianRasa::where('id', $request['id'])->delete();
    	return response()->json($varianRasa);
    }
}

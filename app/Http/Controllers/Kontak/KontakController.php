<?php

namespace App\Http\Controllers\Kontak;

use App\Http\Controllers\Controller;
use App\Models\Kontak\Kontak;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KontakController extends Controller
{
    public function kontakView() {
    	return view('admin.kontak.index');
    }

    public function kontakData() {
    	$kontak = Kontak::get()->toArray();

    	$datatables = DataTables::of($kontak)
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_kontak'].'" data-jenis="'.$data['jenis'].'" data-kontak="'.$data['kontak'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_kontak'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function kontakPost(Request $request) {
    	$kontak = Kontak::create([
    		'jenis' => $request['jenis'],
    		'kontak' => $request['kontak'],
    	]);

    	return response()->json($kontak);
    }

    public function kontakUpdate(Request $request) {
    	$kontak = Kontak::where('id_kontak', $request['id'])->update([
    		'jenis' => $request['jenis'],
    		'kontak' => $request['kontak'],
    	]);
    	return response()->json($kontak);
    }

    public function kontakDelete(Request $request) {
    	$kontak = Kontak::where('id_kontak', $request['id'])->delete();
    	return response()->json($kontak);
    }
}

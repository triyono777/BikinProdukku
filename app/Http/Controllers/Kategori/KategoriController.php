<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function kategoriView() {
    	return view('admin.kategori.index');
    }

    public function kategoriData() {
    	$kategori = Kategori::get()->toArray();

    	$datatables = DataTables::of($kategori)
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_kategori'].'" data-nama="'.$data['nama_kategori'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_kategori'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function kategoriPost(Request $request) {
    	$kategori = Kategori::create([
    		'nama_kategori' => $request['nama_kategori'],
    	]);

    	return response()->json($kategori);
    }

    public function kategoriUpdate(Request $request) {
    	$kategori = Kategori::where('id_kategori', $request['id'])->update([
    		'nama_kategori' => $request['nama_kategori'],
    	]);
    	return response()->json($kategori);
    }

    public function kategoriDelete(Request $request) {
    	$kategori = Kategori::where('id_kategori', $request['id'])->delete();
    	return response()->json($kategori);
    }
}

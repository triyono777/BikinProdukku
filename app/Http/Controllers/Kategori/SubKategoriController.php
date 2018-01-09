<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\SubKategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubKategoriController extends Controller
{
    public function subKategoriView() {
    	$kategori = Kategori::get()->toArray();
    	return view('admin.kategori.sub-kategori', compact('kategori'));
    }

    public function subKategoriData() {
    	$subKategori = SubKategori::with('kategori')->get()->toArray();

    	$datatables = DataTables::of($subKategori)
    		->editColumn('nama_kategori', function($data) {
    			return $data['kategori']['nama_kategori'];
    		})
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_subkategori'].'" data-nama="'.$data['nama_subkategori'].'" data-id_kategori="'.$data['kategori']['id_kategori'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_subkategori'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function subKategoriPost(Request $request) {
    	$subKategori = SubKategori::create([
    		'id_kategori' => $request['id_kategori'],
    		'nama_subkategori' => $request['nama_subkategori'],
    	]);

    	return response()->json($subKategori);
    }

    public function subKategoriUpdate(Request $request) {
    	$subKategori = SubKategori::where('id_subkategori', $request['id'])->update([
    		'id_kategori' => $request['id_kategori'],
    		'nama_subkategori' => $request['nama_subkategori'],
    	]);
    	return response()->json($subKategori);
    }

    public function subKategoriDelete(Request $request) {
    	$subKategori = SubKategori::where('id_subkategori', $request['id'])->delete();
    	return response()->json($subKategori);
    }
}

<?php

namespace App\Http\Controllers\MinimalPembelian;

use App\Http\Controllers\Controller;
use App\Models\MinimalPembelian\MinimalPembelian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MinimalPembelianController extends Controller
{
    public function minimalPembelianView() {
    	return view('admin.minimal_pembelian.index');
    }

    public function minimalPembelianData() {
    	$minimal_pembelian = MinimalPembelian::get()->toArray();

    	$datatables = DataTables::of($minimal_pembelian)
    		->addColumn('action', function($data) {
	            return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id'].'" data-jumlah_pembelian="'.$data['jumlah_pembelian'].'" data-satuan="'.$data['satuan'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id'].'"><i class="fa fa-trash"></i></a>';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function minimalPembelianPost(Request $request) {
    	$minimal_pembelian = MinimalPembelian::create([
    		'jumlah_pembelian' => $request['jumlah_pembelian'],
    		'satuan' => $request['satuan'],
    	]);

    	return response()->json($minimal_pembelian);
    }

    public function minimalPembelianUpdate(Request $request) {
    	$minimal_pembelian = MinimalPembelian::where('id', $request['id'])->update([
    		'jumlah_pembelian' => $request['jumlah_pembelian'],
    		'satuan' => $request['satuan'],
    	]);
    	return response()->json($minimal_pembelian);
    }

    public function minimalPembelianDelete(Request $request) {
    	$minimal_pembelian = MinimalPembelian::where('id', $request['id'])->delete();
    	return response()->json($minimal_pembelian);
    }
}

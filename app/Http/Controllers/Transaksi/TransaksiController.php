<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function transaksiView() {
    	return view('admin.transaksi.index');
    }

    public function transaksiDetailView($id) {
    	return view('admin.transaksi.detail');
    }

    public function transaksiSubDetailView($id, $subId) {
    	return view('admin.transaksi.sub-detail');
    }

    // transaksi CRUD
    public function transaksiData() {
    	$transaksi = Transaksi::with('pengguna')->get()->toArray();

    	$datatables = DataTables::of($transaksi)
    		->editColumn('pengguna', function($data) {
    			return $data['pengguna']['nama'];
    		})
    		->editColumn('status', function($data) {
    			return '<span class="btn btn-xs '.($data['status'] == 1 ? "btn-success" : "btn-danger").'">'.($data['status'] == 1 ? "yes" : "no").'</span>';
    		})
    		->addColumn('action', function($data) {
	            return '
	            		<a href="'.route('admin.transaksiDetailView', $data['kode_invoice']).'" class="btn btn-info"><i class=" fa fa-eye"></i></a>
						<a href="#modal-edit" data-toggle="modal" class="edit btn btn-warning"
						data-kode_invoice="'.$data['kode_invoice'].'"
						data-id_user="'.$data['pengguna']['nama'].'"
						data-tanggal="'.date('m/d/Y', strtotime($data['tanggal'])).'"
						data-status="'.$data['status'].'"
						><i class=" fa fa-edit"></i></a>
						<a href="#!" class="btn btn-danger delete"
						data-id="'.$data['kode_invoice'].'"
						><i class=" fa fa-trash"></i></a>';
	        })
    		->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

     public function transaksiUpdate(Request $request) {
    	$transaksi = Transaksi::where('kode_invoice', $request['kode_invoice'])->update([
			'tanggal' => date('Y-m-d', strtotime($request['tanggal'])),
			'status' => $request['status'],
    	]);
    	return response()->json($transaksi);
    }

    public function transaksiDelete(Request $request) {
    	$transaksi = Transaksi::where('kode_invoice', $request['id'])->delete();
    	return response()->json($transaksi);
    }
}

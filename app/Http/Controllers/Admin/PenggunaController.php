<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Pengguna\Pengguna;
use App\Models\Transaksi\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function penggunaView() {
    	$pengguna = Pengguna::get()->toArray();
    	return view('admin.pengguna.pengguna', compact('pengguna'));
    }

    public function penggunaData() {
    	$pengguna = Pengguna::get()->toArray();
    	$datatables = DataTables::of($pengguna)
    		->addColumn('action', function($data) {
	            return '
	            		<a href="'.route('admin.penggunaDetail', $data['id_user']).'" class="btn btn-info"><i class=" fa fa-eye"></i> Detail</a>
						';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function penggunaDetail($id_user) {
		$pengguna = Pengguna::where('id_user', $id_user)->first()->toArray();
		$formulirEdar = FormulirPendaftaran::where('id_user', $id_user)->first();

		return view('admin.pengguna.pengguna-detail', compact('pengguna', 'formulirEdar'));
    }

    public function penggunaTransaksi($id_user) {
    	$transaksi = Transaksi::where('id_user', $id_user)->get()->toArray();
    	$datatables = DataTables::of($transaksi)
    		->editColumn('tanggal', function($data) {
    			return date('d-F-Y', strtotime($data['tanggal']));
    		})
    		->addColumn('action', function($data) {
	            return '
	            		<a href="'.route('admin.transaksiDetailView', $data['kode_invoice']).'" class="btn btn-info"><i class=" fa fa-eye"></i> Detail</a>
						';
	        })
	        ->addIndexColumn();

	    return $datatables->make(true);
    }
}

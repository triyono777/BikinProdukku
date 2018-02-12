<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Transaksi\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function landingPageView() {
    	return view('admin.home.index');
    }

    public function transaksiData() {
    	$transaksi = Transaksi::with('pengguna')->where('status', 0)->orderBy('tanggal', 'desc')->get()->toArray();

    	$datatables = DataTables::of($transaksi)
    		->editColumn('notifikasi', function($data) {
    			return $data['kode_invoice'] . ' | ' . $data['pengguna']['nama'];
    		})
    		->addColumn('action', function($data) {
	            return '
	            		<a href="'.route('admin.transaksiDetailView', $data['kode_invoice']).'" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a>';
	        })
    		->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function settingAdminView() {
        $admin = Admin::first();
        return view('admin.setting-admin.index',compact('admin'));
    }

    public function settingAdminPost(Request $request) {
        $admin = Admin::where('id_admin', $request['id'])->first();
        $admin->username = $request['username'];
        $admin->password = bcrypt($request['password']);
        $admin->save();

        return response()->json($admin);
    }
}

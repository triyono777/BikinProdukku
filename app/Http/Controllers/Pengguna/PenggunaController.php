<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pengguna\Pengguna;
use App\Models\Transaksi\DetailTransaksi;
use App\Models\Transaksi\SubDetailTransaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function penggunaView($username, $id_user) {
        // $pengguna = Pengguna::select(['id_user'])->with('transaksi.detailTransaksi.subDetailTransaksi')->where('id_user', $id_user)->get()->toArray();
        // dd($pengguna);
    	return view('admin.pengguna.index', compact('pengguna'));
    }

    public function penggunaTransaksiData($username, $id_user) {
    	$pengguna = Pengguna::with('transaksi')->where('id_user', $id_user)->get()->toArray();

    	$datatables = DataTables::of($pengguna[0]['transaksi'])
            ->editColumn('status', function($data) {
                return '<span class="btn btn-xs '.($data['status'] == 1 ? 'btn-success' : 'btn-danger').'">'.($data['status'] == 1 ? "Finished" : "Pending").'</span>';
            })
            ->editColumn('tanggal', function($data) {
                return date('d-F-Y', strtotime($data['tanggal']));
            })
            ->editColumn('total', function($data) {
                return 'Rp. '.number_format($data['total']);
            })
            ->addColumn('action', function($data) use($username, $id_user) {
                return '
                        <a class="btn btn-xs btn-flat btn-info" href="'.route('akun.penggunaTransaksiDetailView', [$username, $id_user]).'">detail <i class="fa fa-search"></i></a>';
            })
            ->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function penggunaTransaksiDetailView($username, $id_user) {
        $pengguna = Pengguna::select(['id_user'])->with(['transaksi.detailTransaksi.subDetailTransaksi', 'transaksi.tracking'])->where('id_user', $id_user)->get()->toArray();
        $pengguna = $pengguna[0]['transaksi'];
        return view('admin.pengguna.transaksi-detail', compact(['pengguna', 'username', 'id_user']));
    }

    public function penggunaSubTransaksiDetailView($username, $id_user, $kode_detail) {
        $sub_detail_transaksi = SubDetailTransaksi::where('kode_detail', $kode_detail)->get()->toArray();
        $detailTransaksi = DetailTransaksi::where('kode_detail', $kode_detail)->first();
        return view('admin.pengguna.sub-detail', compact(['sub_detail_transaksi', 'detailTransaksi']));
    }

}

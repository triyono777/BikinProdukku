<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Tracking\Tracking;
use App\Models\Transaksi\DetailTransaksi;
use App\Models\Transaksi\SubDetailTransaksi;
use App\Models\Transaksi\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function transaksiView() {
    	return view('admin.transaksi.index');
    }

    public function transaksiDetailView($id) {
        $transaksi = Transaksi::with(['tracking', 'detailTransaksi'])->where('kode_invoice', $id)->first()->toArray();
        $kode_invoice = $id;
    	return view('admin.transaksi.detail', compact(['transaksi', 'kode_invoice']));
    }

    public function transaksiSubDetailView($id, $subId) {
        // $subDetailTransaksi = SubDetailTransaksi::with('detailTransaksi')->where('kode_detail', $subId)->get()->toArray();
        $detailTransaksi = DetailTransaksi::with('subDetailTransaksi')->where('kode_detail', $subId)->first()->toArray();
        $kode_invoice = $id;
        // $nama_produk = $subDetailTransaksi[0]['detail_transaksi']['nama_produk'];
        // dd($detailTransaksi);
    	return view('admin.transaksi.sub-detail', compact(['detailTransaksi', 'kode_invoice']));
    }

    // transaksi CRUD
    public function transaksiData() {
    	$transaksi = Transaksi::with('pengguna')->get()->toArray();

    	$datatables = DataTables::of($transaksi)
    		->editColumn('pengguna', function($data) {
    			return $data['pengguna']['nama'];
    		})
    		->editColumn('status', function($data) {
    			return '<span class="btn btn-xs '.($data['status'] == 1 ? "btn-success" : "btn-danger").'">'.($data['status'] == 1 ? "Finished" : "Pending").'</span>';
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

    public function transaksiStatusUpdate(Request $request, $id) {
        $transaksi = Transaksi::where('kode_invoice', $id)->first();
        $transaksi->status = $request['status'];
        $transaksi->save();

        return response()->json($request['status']);
    }

    public function transaksiTrackingUpdate(Request $request, $id) {
        $transaksi = Tracking::where('kode_invoice', $id)->first();
        $transaksi->pembelian_bahan_baku = $request['pembelian_bahan_baku'] == 1 ? 1 : 0;
        $transaksi->cetak_kemasan = $request['cetak_kemasan'] == 1 ? 1 : 0;
        $transaksi->produksi = $request['produksi'] == 1 ? 1 : 0;
        $transaksi->qc = $request['qc'] == 1 ? 1 : 0;
        $transaksi->finishing = $request['finishing'] == 1 ? 1 : 0;
        $transaksi->pengiriman = $request['pengiriman'] == 1 ? 1 : 0;
        $transaksi->save();

        return response()->json($transaksi);
    }
}

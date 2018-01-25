<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Pengguna\Pengguna;
use App\Models\Transaksi\DetailTransaksi;
use App\Models\Transaksi\SubDetailTransaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function id_user() {
        return auth()->guard('pengguna')->user()->id_user;
    }

    public function penggunaView() {
        $id_user = $this->id_user();
        $pengguna = Pengguna::select(['id_user'])->with('transaksi.detailTransaksi.subDetailTransaksi')->where('id_user', $id_user)->get()->toArray();
        // dd($pengguna);
    	return view('admin.pengguna.index', compact('pengguna'));
    }

    public function penggunaTransaksiData() {
        $id_user = $this->id_user();
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
            ->addColumn('action', function($data) use($id_user) {
                return '
                        <a class="btn btn-xs btn-flat btn-info" href="'.route('akun.penggunaTransaksiDetailView').'">detail <i class="fa fa-search"></i></a>';
            })
            ->rawColumns(['status', 'action'])
	        ->addIndexColumn();

	    return $datatables->make(true);
    }

    public function penggunaTransaksiDetailView() {
        $id_user = $this->id_user();
        $pengguna = Pengguna::select(['id_user'])->with(['transaksi.detailTransaksi.subDetailTransaksi', 'transaksi.tracking'])->where('id_user', $id_user)->get()->toArray();
        $pengguna = $pengguna[0]['transaksi'];
        return view('admin.pengguna.transaksi-detail', compact(['pengguna', 'id_user']));
    }

    public function penggunaSubTransaksiDetailView($kode_detail) {
        $id_user = $this->id_user();
        $sub_detail_transaksi = SubDetailTransaksi::where('kode_detail', $kode_detail)->get()->toArray();
        $detailTransaksi = DetailTransaksi::where('kode_detail', $kode_detail)->first();
        return view('admin.pengguna.sub-detail', compact(['sub_detail_transaksi', 'detailTransaksi']));
    }

    // Data Diri
    public function dataPribadiView() {
        $id_user = $this->id_user();
        $dataDiri = FormulirPendaftaran::where('id', $id_user)->first();
        return view('admin.pengguna.data-pribadi', compact(['dataDiri', 'id_user']));
    }

    public function dataPribadiPost(Request $request) {
        $id_user = $this->id_user();
        $dataDiri = FormulirPendaftaran::where('id', $id_user)->first();
        if ($request->hasFile($request['foto'])) {
            $foto = time() . str_random(5) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/foto_pengguna/' . $foto));

            $dataDiri->update([
                'nik' => $request['nik'],
                'nama_lengkap' => $request['nama_lengkap'],
                'tempat' => $request['tempat'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'status_perkawinan' => $request['status_perkawinan'],
                'pekerjaan' => $request['pekerjaan'],
                'alamat' => $request['alamat'],
                'foto' => $request['foto'],
                'motivasi_berbisnis' => $request['motivasi_berbisnis'],
                'hobi' => $request['hobi'],
            ]);
        }else {
            $dataDiri->update([
                'nik' => $request['nik'],
                'nama_lengkap' => $request['nama_lengkap'],
                'tempat' => $request['tempat'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'status_perkawinan' => $request['status_perkawinan'],
                'pekerjaan' => $request['pekerjaan'],
                'alamat' => $request['alamat'],
                'motivasi_berbisnis' => $request['motivasi_berbisnis'],
                'hobi' => $request['hobi'],
            ]);
        }

    }
}

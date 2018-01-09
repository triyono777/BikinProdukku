<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku\SubHargaBahanBaku;
use App\Models\Satuan\Satuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubHargaBahanBakuController extends Controller
{
    public function produkHargaBahanView($id, $id_bahan_baku) {
        $satuan = Satuan::get()->toArray();
        $kode_produk = $id;
        $id_bahan_baku = $id_bahan_baku;
        return view('admin.produk.sub-harga-bahan', compact(['satuan', 'kode_produk', 'id_bahan_baku']));
    }

    // Bahan baku CRUD
    public function subHargaBahanBakuData($kode_produk, $id_bahan_baku) {
        $subHargaBahanBaku = SubHargaBahanBaku::with(['satuan', 'bahanbaku'])->orderBy('created_at', 'desc')->get()->toArray();

        $datatables = DataTables::of($subHargaBahanBaku)
            ->editColumn('kode_bahan', function($data) {
                return $data['bahanbaku']['nama_bahan'];
            })
            ->editColumn('id_satuan', function($data) {
                return $data['satuan']['nama_satuan'];
            })
            ->addColumn('action', function($data) use($id_bahan_baku) {
                return '
                	<a href="#modal-edit" data-toggle="modal" class="btn btn-warning edit"
                    data-id="'.$data['kode_harga'].'"
                    data-kode_bahan="'.$id_bahan_baku.'"
                    data-id_satuan="'.$data['id_satuan'].'"
                    data-nama="'.$data['nama_supplier'].'"
                    data-harga="'.$data['harga'].'"
                    ><i class=" fa fa-edit"></i></a>
                    <a href="#!" class="btn btn-danger delete" data-id="'.$data['kode_harga'].'"><i class=" fa fa-trash"></i></a>
                ';
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function subHargaBahanBakuPost(Request $request, $kode_produk, $kode_bahan) {
        $subHargaBahanBaku = SubHargaBahanBaku::create([
        	'kode_bahan' => $kode_bahan,
            'id_satuan' => $request['id_satuan'],
            'nama_supplier' => $request['nama_supplier'],
        	'harga' => $request['harga'],
        ]);

        return response()->json($subHargaBahanBaku);
    }

    public function subHargaBahanBakuUpdate(Request $request, $kode_produk, $kode_bahan) {
        $subHargaBahanBaku = SubHargaBahanBaku::where('kode_harga', $request['id'])->update([
            'kode_bahan' => $kode_bahan,
            'id_satuan' => $request['id_satuan'],
            'nama_supplier' => $request['nama_supplier'],
            'harga' => $request['harga'],
        ]);
        return response()->json($request['id']);
    }

    public function subHargaBahanBakuDelete(Request $request) {
        $subHargaBahanBaku = SubHargaBahanBaku::where('kode_harga', $request['id'])->delete();
        return response()->json($subHargaBahanBaku);
    }
}

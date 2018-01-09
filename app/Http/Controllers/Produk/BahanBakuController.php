<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku\BahanBaku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BahanBakuController extends Controller
{
    // Bahan baku CRUD
    public function bahanBakuData($kode_produk) {
        $bahanBaku = BahanBaku::get()->toArray();

        $datatables = DataTables::of($bahanBaku)
            ->editColumn('caption', function($data) {
                return strip_tags($data['caption']);
            })
            ->addColumn('action', function($data) use($kode_produk) {
                return '
                	<a href="'.route('admin.produkHargaBahanView', [$kode_produk, $data['kode_bahan']]).'" class="btn btn-info"><i class=" fa fa-eye"></i></a>
					<a href="#modal-edit2" data-toggle="modal" class="btn btn-warning edit"
                    data-id="'.$data['kode_bahan'].'"
                    data-nama="'.$data['nama_bahan'].'"
                    data-caption="'.$data['caption'].'"
                    ><i class=" fa fa-edit"></i></a>
					<a href="#!" class="btn btn-danger delete"><i class=" fa fa-trash"></i></a>
                ';
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function bahanBakuPost(Request $request, $kode_produk) {
        $bahanBaku = BahanBaku::create([
        	'kode_produk' => $kode_produk,
        	'nama_bahan' => $request['nama_bahan'],
            'caption' => $request['caption'],
        ]);

        return response()->json($bahanBaku);
    }

    public function bahanBakuUpdate(Request $request, $kode_produk) {
        $bahanBaku = BahanBaku::where('kode_bahan', $request['id'])->update([
            'kode_produk' => $kode_produk,
            'nama_bahan' => $request['nama_bahan'],
            'caption' => $request['caption'],
        ]);
        return response()->json($request['id']);
    }

    public function bahanBakuDelete(Request $request) {
        $bahanBaku = BahanBaku::where('kode_produk', $request['id'])->delete();
        return response()->json($bahanBaku);
    }
}

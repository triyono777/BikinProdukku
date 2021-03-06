<?php

namespace App\Http\Controllers\Produk;

use App\Helpers\AutoNumber;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\SubKategori;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\Produk;
use App\Models\Satuan\Satuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    public function produkView() {
        $subKategori = SubKategori::get()->toArray();
    	return view('admin.produk.index', compact('subKategori'));
    }

    public function produkDetailView($id) {
        $kode_produk = $id;
        $gambarProduk = GambarProduk::where('kode_produk', $id)->get()->toArray();
        $satuan = Satuan::get()->toArray();
    	return view('admin.produk.detail', compact(['kode_produk', 'gambarProduk', 'satuan']));
    }


    // Produk CRUD
    public function produkData() {
        $produk = Produk::with('subkategori')->get()->toArray();

        $datatables = DataTables::of($produk)
            ->editColumn('nama_kategori', function($data) {
                return $data['subkategori']['nama_subkategori'];
            })
            ->editColumn('sold_out', function($data) {
                return ($data['sold_out'] ? 'Ya' : 'Tidak');
            })
            ->editColumn('perbesar', function($data) {
                return ($data['perbesar'] ? 'Ya' : 'Tidak');
            })
            ->addColumn('action', function($data) {
                return '
                        <a href="'.route('admin.produkDetailView', $data['kode_produk']).'" class="btn btn-info"
                        ><i class=" fa fa-eye"></i></a>
                        <a href="#modal-edit" class="btn btn-warning edit" data-toggle="modal"
                        data-id="'.$data['kode_produk'].'"
                        data-id_kategori="'.$data['id_kategori'].'"
                        data-nama_produk="'.$data['nama_produk'].'"
                        data-biaya_operasional="'.$data['biaya_operasional'].'"
                        data-sold_out="'.$data['sold_out'].'"
                        data-perbesar="'.$data['perbesar'].'"
                        data-caption="'.$data['caption'].'"
                        ><i class=" fa fa-edit"></i></a>
                        <a href="#!" class="btn btn-danger delete" data-id="'.$data['kode_produk'].'"><i class=" fa fa-trash"></i></a>';
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    public function produkPost(Request $request) {
        $produk = Produk::create([
            'kode_produk' => AutoNumber::autoNumberProduk('produk', 'kode_produk', 'KP'),
            'id_kategori' => $request['id_kategori'],
            'nama_produk' => $request['nama_produk'],
            'biaya_operasional' => $request['biaya_operasional'],
            'sold_out' => ($request['sold_out'] ? 1 : 0),
            'perbesar' => ($request['perbesar'] ? 1 : 0),
            'caption' => $request['caption']
        ]);

        return response()->json($produk);
    }

    public function produkUpdate(Request $request) {
        $produk = Produk::where('kode_produk', $request['id'])->update([
            'id_kategori' => $request['id_kategori'],
            'nama_produk' => $request['nama_produk'],
            'sold_out' => ($request['sold_out'] ? 1 : 0),
            'perbesar' => ($request['perbesar'] ? 1 : 0),
        ]);
        return response()->json($request->all());
    }

    public function produkDelete(Request $request) {
        $produk = Produk::where('kode_produk', $request['id'])->delete();
        return response()->json($produk);
    }
}

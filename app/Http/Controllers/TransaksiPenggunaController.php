<?php

namespace App\Http\Controllers;

use App\Helpers\AutoNumber;
use App\Models\BahanBaku\BahanBaku;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Kategori\Kategori;
use App\Models\MinimalPembelian\MinimalPembelian;
use App\Models\Produk\GambarProduk;
use App\Models\Produk\GambarTemplate;
use App\Models\Produk\GambarWarna;
use App\Models\Produk\Produk;
use App\Models\Tagline\Tagline;
use App\Models\Tracking\Tracking;
use App\Models\Transaksi\DetailTransaksi;
use App\Models\Transaksi\SubDetailTransaksi;
use App\Models\Transaksi\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class TransaksiPenggunaController extends Controller
{
    public function index($kode_produk, $kode_gambar) {
    	$kategori = Kategori::with('subKategori')->get()->toArray();
    	$gambarProduk = GambarProduk::where('kode_produk', $kode_produk)->get()->toArray();
        $bahanBaku = BahanBaku::with(['satuan'])->where('kode_produk', $kode_produk)->get();
        // dd($bahanBaku);
        $gambarProduk2 = Produk::with('gambarProduk')->where('kode_produk', '!=', $kode_produk)->get()->toArray();
        $gambarTemplate = GambarTemplate::where('kode_gambar', $kode_gambar)->get()->toArray();
        if (auth()->guard('pengguna')->check()) {
            $id_user = auth()->guard('pengguna')->user()->id_user;
        }else{
            $id_user = '';
        }
        $formulirPendaftaran = FormulirPendaftaran::where('id_user', $id_user)->first();
        $totalLoop = count($bahanBaku);
        $totalAwal = $bahanBaku->sum('harga');
        $minimal_pembelian = MinimalPembelian::get()->toArray();
		return view('home.transaksi.index', compact('gambarProduk', 'kategori', 'kode_produk', 'bahanBaku', 'totalLoop', 'totalAwal', 'gambarProduk2', 'kode_gambar', 'gambarTemplate', 'formulirPendaftaran', 'minimal_pembelian'));
    }

    public function getGambarTemplate(Request $request) {
		$gambarTemplate = GambarTemplate::where('kode_gambar', $request['kode_gambar'])->get()->toArray();
		$gambarText = GambarProduk::select(['kode_gambar', 'gambar_text'])->where('kode_gambar', $request['kode_gambar'])->first();
		return response()->json([$gambarTemplate, $gambarText]);
    }

    public function getGambarWarna(Request $request) {
    	$gambarWarna = GambarWarna::where('kode_template', $request['kode_template'])->get()->toArray();
    	return response()->json($gambarWarna);
    }

    public function transaksiProses(Request $request, $kode_produk, $kode_gambar) {
        // dd($request->all());
        // Session::forget('kode_invoice');

        $id_user = auth()->guard('pengguna')->user()->id_user;
        if (Session::get('kode_invoice') == null) {
            $transaksi = new Transaksi;
            $transaksi->kode_invoice = AutoNumber::autoNumberTransaksi('transaksi', 'kode_invoice', 'INV');
            $transaksi->id_user = $id_user;
            $transaksi->total = str_replace(',', '', $request['total_keseluruhan']);
            $transaksi->tanggal = date('Y-m-d');
            $transaksi->save();
            // create session
            Session::put('kode_invoice', $transaksi->kode_invoice);
            // tracking
            $tracking = new Tracking;
            $tracking->kode_invoice = $transaksi->kode_invoice;
            $tracking->save();

        }else {
            $transaksi = Transaksi::select(['kode_invoice', 'total'])->where('kode_invoice', Session::get('kode_invoice'))->first();
            $penambahan_total = str_replace(',', '', $transaksi['total']) + str_replace(',', '', $request['total_keseluruhan']);
            $transaksi->total = $penambahan_total;
            $transaksi->save();
        }
        $cek_session = Session::get('kode_invoice');


        // Tagline
        $tagline = new Tagline;
        $tagline->kode_invoice = $cek_session;
        $tagline->nama = $request['nama_tagline'];
        $tagline->isi = $request['tagline'];
        $tagline->save();

        // cari produk
        $produk = Produk::where('kode_produk', $kode_produk)->first();

        // detail transaksi
        $detailTransaksi = new DetailTransaksi;
        $detailTransaksi->kode_invoice = $cek_session;
        $detailTransaksi->nama_produk = $produk['nama_produk'];
        $detailTransaksi->biaya_design = str_replace(',', '',$request['subtotal_biaya_tambahan']);
        $detailTransaksi->jumlah_pembelian_id = $request['minimal_pembelian'];
        if ($request->file('gambar_produk_baru')) {
            $name = $request->file('gambar_produk_baru');
            $gambar_produk_baru = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/gambar-produk-pengguna/' . $gambar_produk_baru));
            $detailTransaksi->gambar_produk = $gambar_produk_baru;
        }
        $detailTransaksi->biaya_kirim = 0;
        $detailTransaksi->subtotal = str_replace(',', '', $request['biaya_total']);
        $detailTransaksi->caption = $request['rincian_produk'];
        if ($request->file('gambar_logo')) {
            $name = $request->file('gambar_logo');
            $gambar_logo = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/gambar-logo-pengguna/' . $gambar_logo));
            $detailTransaksi->gambar_logo = $gambar_logo;
        }
        if ($request->file('gambar_sendiri')) {
            $name = $request->file('gambar_sendiri');
            $gambar_sendiri = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/gambar-sendiri-pengguna/' . $gambar_sendiri));
            $detailTransaksi->gambar_sendiri = $gambar_sendiri;
        }
        $detailTransaksi->save();
        // dd($detailTransaksi);
        // input sub detail transaksi
        foreach ($request['bahan_baku'] as $key => $value) {
            $subDetailTransaksi = new SubDetailTransaksi;
            $subDetailTransaksi->kode_detail = $detailTransaksi->kode_detail;
            $subDetailTransaksi->nama_bahan = $value;
            $subDetailTransaksi->jumlah = $request['satuan'][$key];
            $subDetailTransaksi->subtotal = str_replace(',', '', $request['harga'][$key]);
            $subDetailTransaksi->save();
        }

        // input formulir hpp
        if ($request['nik']) {
            $formulir = new FormulirPendaftaran;
            $formulir->id_user = $id_user;
            $formulir->nik = $request['nik'];
            $formulir->nama_lengkap = $request['nama_lengkap'];
            $formulir->tempat = $request['tempat'];
            $formulir->tgl_lahir = date('Y-m-d', strtotime($request['tgl_lahir']));
            $formulir->jenis_kelamin = $request['jenis_kelamin'];
            $formulir->status_perkawinan = $request['status_perkawinan'];
            $formulir->pekerjaan = $request['pekerjaan'];
            $formulir->alamat = $request['alamat'];

            if ($request->file('foto')) {
                $name = $request->file('foto');
                $foto = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
                $image = Image::make($name);
                $image->encode('jpg', 75);
                $image->save(public_path('upload/foto-pengguna/' . $foto));
                $formulir->foto = $foto;
            }

            $formulir->motivasi_berbisnis = $request['motivasi_berbisnis'];
            $formulir->hobi = $request['hobi'];
            $formulir->save();

        }
        return redirect()->route('home.cart')->with('success', 'Proses transaksi berhasil, pesanan anda akan di proses setelah meng-upload bukti pembayaran kepada kami, terima kasih');
    }

    public function cart() {
        if (auth()->guard('pengguna')->check()) {
            $id_user = auth()->guard('pengguna')->user()->id_user;
        }else{
            $id_user = '';
        }
        $transaksi = Transaksi::with(['detailTransaksi.minimalPembelian'])->where(['id_user' => $id_user, 'status' => 0])->orderBy('created_at','desc')->first();
        $formulir = FormulirPendaftaran::where('id_user', $id_user)->first();
        $kode_invoice = $transaksi['kode_invoice'];
        return view('home.cart', compact('transaksi', 'kode_invoice', 'formulir'));
    }

    public function cartDelete(Request $request) {
        if ($request['count'] == 1) {
            $transaksi = DB::table('transaksi')
                        ->where('kode_invoice', $request['kode_detail'])
                        ->delete();

            $detailTransaksi = DB::table('detail_transaksi')
                            ->where('kode_invoice', $request['kode_detail'])
                            ->first();
            File::delete('upload/gambar-produk-pengguna/'.$detailTransaksi->gambar_produk);
            File::delete('upload/gambar-logo-pengguna/'.$detailTransaksi->gambar_logo);
            File::delete('upload/gambar-sendiri-pengguna/'.$detailTransaksi->gambar_sendiri);



            $deleteSubDetailTransaksi = DB::table('sub_detail_transaksi')
                            ->where('kode_detail', $detailTransaksi->kode_detail)
                            ->delete();

            $deleteDetailTransaksi = DB::table('detail_transaksi')
                            ->where('kode_invoice', $request['kode_detail'])
                            ->delete();

            $tagline = DB::table('taglines')
                            ->where('kode_invoice', $request['kode_detail'])
                            ->delete();
            $tracking = DB::table('tracking')
                            ->where('kode_invoice', $request['kode_detail'])
                            ->delete();

            session()->forget('kode_invoice');
            return response()->json($transaksi);
        }else {
            $subtotal = DB::table('detail_transaksi')
                        ->where('kode_detail', '=', (int)$request['kode_detail'])
                        ->sum(DB::raw('subtotal + biaya_design'));

            $kode_invoice = session()->get('kode_invoice');

            $transaksi = DB::table('transaksi')
                        ->where('kode_invoice', $kode_invoice)
                        ->select(['kode_invoice', 'total'])
                        ->first();
            $hasil = ($transaksi->total - $subtotal);
            $transaksi2 = DB::table('transaksi')
                        ->where('kode_invoice', $kode_invoice)
                        ->update(['total' => $hasil]);

            $deleteDetailTransaksi = DB::table('detail_transaksi')
                            ->where('kode_detail', $request['kode_detail'])
                            ->delete();

            $deleteSubDetailTransaksi = DB::table('sub_detail_transaksi')
                            ->where('kode_detail', $request['kode_detail'])
                            ->delete();

            return response()->json($deleteDetailTransaksi);
        }
    }

    public function cartDetail(Request $request) {
        $subDetailTransaksi = SubDetailTransaksi::where('kode_detail', $request['kode_detail'])->get();
        return response()->json($subDetailTransaksi);
    }

    public function pembayaranView() {
        return view('home.pembayaran');
    }

    public function pembayaranPost(Request $request) {
        if ($request->file('bukti_pembayaran')) {
            $name = $request->file('bukti_pembayaran');
            $kode_invoice = session()->get('kode_invoice');
            $transaksi = Transaksi::where('kode_invoice', $kode_invoice)->first();
            $bukti_pembayaran = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/bukti_pembayaran/' . $bukti_pembayaran));
            $transaksi->gambar_bukti = $bukti_pembayaran;
            $transaksi->save();
        }

        session()->forget('kode_invoice');
        return redirect()->back()->with('success', 'Berhasil di upload, sistem kami akan segera mengkonfirmasi pembayaran anda');
    }

    public function formulirPost(Request $request) {
        $id_user = auth()->guard('pengguna')->user()->id_user;
            $formulir = new FormulirPendaftaran;
            $formulir->id_user = $id_user;
            $formulir->nik = $request['nik'];
            $formulir->nama_lengkap = $request['nama_lengkap'];
            $formulir->tempat = $request['tempat'];
            $formulir->tgl_lahir = date('Y-m-d', strtotime($request['tgl_lahir']));
            $formulir->jenis_kelamin = $request['jenis_kelamin'];
            $formulir->status_perkawinan = $request['status_perkawinan'];
            $formulir->pekerjaan = $request['pekerjaan'];
            $formulir->alamat = $request['alamat'];

            if ($request->file('foto')) {
                $name = $request->file('foto');
                $foto = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
                $image = Image::make($name);
                $image->encode('jpg', 75);
                $image->save(public_path('upload/foto-pengguna/' . $foto));
                $formulir->foto = $foto;
            }

            $formulir->motivasi_berbisnis = $request['motivasi_berbisnis'];
            $formulir->hobi = $request['hobi'];
            $formulir->save();

            return redirect()->back()->with('success', 'Pengisian Formulir berhasil');
    }
}


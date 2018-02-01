<?php

namespace App\Http\Controllers;

use App\Helpers\AutoNumber;
use App\Models\BahanBaku\BahanBaku;
use App\Models\FormulirPendaftaran\FormulirPendaftaran;
use App\Models\Kategori\Kategori;
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
		return view('home.transaksi.index', compact('gambarProduk', 'kategori', 'kode_produk', 'bahanBaku', 'totalLoop', 'totalAwal', 'gambarProduk2', 'kode_gambar', 'gambarTemplate', 'formulirPendaftaran'));
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
        $id_user = auth()->guard('pengguna')->user()->id_user;
        // transaksi
        $transaksi = new Transaksi;
        $transaksi->kode_invoice = AutoNumber::autoNumberTransaksi('transaksi', 'kode_invoice', 'INV');
        $transaksi->id_user = $id_user;
        $transaksi->total = $request['total_keseluruhan'];
        $transaksi->tanggal = date('Y-m-d');
        $transaksi->save();

        // tracking
        $tracking = new Tracking;
        $tracking->save();

        // Tagline
        $tagline = new Tagline;
        $tagline->kode_invoice = $transaksi->kode_invoice;
        $tagline->nama = $request['nama_tagline'];
        $tagline->isi = $request['tagline'];
        $tagline->save();

        // cari produk
        $produk = Produk::where('kode_produk', $kode_produk)->first();

        // detail transaksi
        $detailTransaksi = new DetailTransaksi;
        $detailTransaksi->kode_invoice = $transaksi->kode_invoice;
        $detailTransaksi->nama_produk = $produk['nama_produk'];
        if ($request->file('gambar_produk_baru')) {
            $name = $request->file('gambar_produk_baru');
            $gambar_produk_baru = time() . str_random(10) . '.' . $name->getClientOriginalExtension();
            $image = Image::make($name);
            $image->encode('jpg', 75);
            $image->save(public_path('upload/gambar-produk-pengguna/' . $gambar_produk_baru));
            $detailTransaksi->gambar_produk = $gambar_produk_baru;
        }
        $detailTransaksi->biaya_kirim = 0;
        $detailTransaksi->subtotal = $request['biaya_total'];
        $detailTransaksi->caption = ' ';
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

        // input sub detail transaksi
        foreach ($request['bahan_baku'] as $key => $value) {
            $subDetailTransaksi = new SubDetailTransaksi;
            $subDetailTransaksi->kode_detail = $detailTransaksi->id;
            $subDetailTransaksi->nama_bahan = $value;
            $subDetailTransaksi->jumlah = $request['satuan'][$key];
            $subDetailTransaksi->subtotal = $request['harga'][$key];
            $subDetailTransaksi->save();
        }

        // input formulir hpp
        if ($request['nik']) {
            // $formulir = FormulirPendaftaran::where('id_user', $id_user)->first();
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
        $transaksi = Transaksi::where(['id_user' => $id_user, 'status' => 0])->get()->toArray();
        return view('home.cart', compact('transaksi'));
    }
}


<?php

namespace App\Providers;

use App\Models\Kategori\Kategori;
use App\Models\Kontak\Kontak;
use App\Models\Transaksi\Transaksi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {

            if (auth()->guard('pengguna')->check()) {
                $transaksi = Transaksi::with('DetailTransaksi')->where(['id_user' => auth()->guard('pengguna')->user()->id_user, 'status' => 0])->orderBy('created_at', 'desc')->first();
                $jumlah_cart = count($transaksi['detail_transaksi']);
            }else {
                $jumlah_cart = 0;
            }

            $kategori = Kategori::with('subKategori')->get()->toArray();
            $kontak = Kontak::first();

            $view->with(['kategori' => $kategori, 'kontak' => $kontak, 'jumlah_cart' => $jumlah_cart]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

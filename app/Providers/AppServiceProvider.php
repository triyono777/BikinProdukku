<?php

namespace App\Providers;

use App\Models\Kategori\Kategori;
use App\Models\Kontak\Kontak;
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
            $kategori = Kategori::with('subKategori')->get()->toArray();
            $kontak = Kontak::first();
            $view->with(['kategori' => $kategori, 'kontak' => $kontak]);
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

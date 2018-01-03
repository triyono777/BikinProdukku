<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    protected $table = 'gambar_produk';

    protected $guarded = ['kode_warna'];
}

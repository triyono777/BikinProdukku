<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    protected $table = 'gambar_produk';

    protected $guarded = ['kode_gambar'];

    protected $primaryKey = 'kode_gambar';
}

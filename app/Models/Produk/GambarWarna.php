<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class GambarWarna extends Model
{
    protected $table = 'gambar_warna';

    protected $guarded = ['kode_warna'];

    protected $primaryKey = 'kode_warna';
}

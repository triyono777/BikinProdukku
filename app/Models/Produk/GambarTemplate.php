<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class GambarTemplate extends Model
{
    protected $table = 'gambar_template';

    protected $guarded = ['kode_template'];

    protected $primaryKey = 'kode_template';
}

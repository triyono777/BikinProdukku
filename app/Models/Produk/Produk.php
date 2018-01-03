<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $guarded = ['kode_produk'];
}

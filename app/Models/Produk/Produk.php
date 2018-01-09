<?php

namespace App\Models\Produk;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $guarded = [''];

    public function kategori() {
    	return $this->belongsTo('App\Models\Kategori\Kategori', 'id_kategori', 'id_kategori');
    }
}

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

    public function subkategori() {
    	return $this->belongsTo('App\Models\Kategori\SubKategori', 'id_kategori', 'id_subkategori');
    }

	public function gambarproduk() {
    	return $this->hasMany('App\Models\Produk\GambarProduk', 'kode_produk', 'kode_produk');
    }

}

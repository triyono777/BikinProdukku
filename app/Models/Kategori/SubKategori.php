<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table = 'sub_kategori';

    protected $guarded = ['id_subkategori'];

    public function kategori() {
    	return $this->belongsTo('App\Models\Kategori\Kategori', 'id_kategori', 'id_kategori');
    }
}

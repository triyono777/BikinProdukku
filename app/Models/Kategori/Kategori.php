<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $guarded = ['id_kategori'];

    public function subKategori() {
    	return $this->hasMany('App\Models\Kategori\SubKategori', 'id_kategori', 'id_kategori');
    }
}

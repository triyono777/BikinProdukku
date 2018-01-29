<?php

namespace App\Models\BahanBaku;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';

    protected $guarded = ['kode_bahan'];

    public function sub_harga_bahan() {
    	return $this->hasMany('App\Models\BahanBaku\SubHargaBahanBaku', 'kode_bahan', 'kode_bahan');
    }

    public function satuan() {
    	return $this->belongsTo('App\Models\Satuan\Satuan', 'id_satuan', 'id_satuan');
    }
}

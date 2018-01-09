<?php

namespace App\Models\BahanBaku;

use Illuminate\Database\Eloquent\Model;

class SubHargaBahanBaku extends Model
{
    protected $table = 'sub_harga_bahan_baku';

    protected $guarded = ['kode_harga'];

    public function bahanbaku() {
    	return $this->belongsTo('App\Models\BahanBaku\BahanBaku', 'kode_bahan', 'kode_bahan');
    }

    public function satuan() {
    	return $this->belongsTo('App\Models\Satuan\Satuan', 'id_satuan', 'id_satuan');
    }
}

<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $guarded = [''];

    public function subDetailTransaksi() {
    	return $this->hasMany('App\Models\Transaksi\SubDetailTransaksi', 'kode_detail', 'kode_detail');
    }
}

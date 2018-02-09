<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $guarded = ['kode_detail'];

    protected $primaryKey = 'kode_detail';

    public function subDetailTransaksi() {
    	return $this->hasMany('App\Models\Transaksi\SubDetailTransaksi', 'kode_detail', 'kode_detail');
    }

    public function minimalPembelian() {
        return $this->belongsTo('App\Models\MinimalPembelian\MinimalPembelian', 'jumlah_pembelian_id', 'id');
    }
}

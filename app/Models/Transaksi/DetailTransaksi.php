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

    public function kemasan() {
        return $this->belongsTo('App\Models\Kemasan\Kemasan', 'kemasan_id', 'id');
    }

    public function transVarian() {
        return $this->hasMany('App\Models\Varian\TransVarian', 'detail_transaksi_id', 'kode_detail');
    }
}

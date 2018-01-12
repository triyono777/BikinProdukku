<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = ['kode_invoice'];

    protected $primaryKey = 'kode_invoice';

    public $incrementing = false;

    public function pengguna() {
    	return $this->belongsTo('App\Models\Pengguna\Pengguna', 'id_user', 'id_user');
    }

    public function tracking() {
    	return $this->belongsTo('App\Models\Tracking\Tracking', 'kode_invoice', 'kode_invoice');
    }

    public function detailTransaksi() {
    	return $this->hasMany('App\Models\Transaksi\DetailTransaksi', 'kode_invoice', 'kode_invoice');
    }
}

<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = ['kode_invoice'];

    public function pengguna() {
    	return $this->belongsTo('App\Models\Pengguna\Pengguna', 'id_user', 'id_user');
    }
}

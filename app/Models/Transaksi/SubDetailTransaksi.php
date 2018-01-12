<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class SubDetailTransaksi extends Model
{
   protected $table = 'sub_detail_transaksi';

   protected $guarded = ['kode_sub'];

   public function detailTransaksi() {
   	return $this->belongsTo('App\Models\Transaksi\DetailTransaksi', 'kode_detail', 'kode_detail');
   }
}

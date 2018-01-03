<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class SubDetailTransaksi extends Model
{
   protected $table = 'sub_detail_transaksi';

   protected $guarded = ['kode_sub'];
}

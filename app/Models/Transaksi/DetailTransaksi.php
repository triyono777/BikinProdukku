<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $guarded = ['kode_detail'];
}

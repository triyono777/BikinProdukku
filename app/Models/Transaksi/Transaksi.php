<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = ['kode_invoice'];
}

<?php

namespace App\Models\MetodePembayaran;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayaran';

    protected $guarded = ['id_metbayar'];
}

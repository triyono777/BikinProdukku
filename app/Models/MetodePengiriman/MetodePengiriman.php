<?php

namespace App\Models\MetodePengiriman;

use Illuminate\Database\Eloquent\Model;

class MetodePengiriman extends Model
{
    protected $table = 'metode_pengiriman';

    protected $guarded = ['id_metkirim'];
}

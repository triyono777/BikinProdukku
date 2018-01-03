<?php

namespace App\Models\BahanBaku;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';

    protected $guarded = ['kode_bahan'];
}

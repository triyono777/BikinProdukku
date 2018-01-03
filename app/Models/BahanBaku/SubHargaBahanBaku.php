<?php

namespace App\Models\BahanBaku;

use Illuminate\Database\Eloquent\Model;

class SubHargaBahanBaku extends Model
{
    protected $table = 'sub_harga_bahan_baku';

    protected $guarded = ['kode_harga'];;
}

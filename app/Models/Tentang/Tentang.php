<?php

namespace App\Models\Tentang;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentang';

    protected $guarded = ['id_tentang'];

    protected $primaryKey = 'id_tentang';
}

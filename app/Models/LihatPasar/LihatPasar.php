<?php

namespace App\Models\LihatPasar;

use Illuminate\Database\Eloquent\Model;

class LihatPasar extends Model
{
    protected $table = 'lihat_pasar';

    protected $guarded = ['id_pasar'];
}

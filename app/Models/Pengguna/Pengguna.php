<?php

namespace App\Models\Pengguna;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $guarded = ['id_user'];
}

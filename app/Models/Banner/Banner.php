<?php

namespace App\Models\Banner;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $guarded = ['id_banner'];

    protected $primaryKey = 'id_banner';
}

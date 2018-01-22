<?php

namespace App\Models\Tagline;

use Illuminate\Database\Eloquent\Model;

class Tagline extends Model
{
    protected $table = 'taglines';

    protected $guarded = ['id_tagline'];
}

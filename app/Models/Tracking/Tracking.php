<?php

namespace App\Models\Tracking;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking';

    protected $guarded = ['kode_invoice'];
}

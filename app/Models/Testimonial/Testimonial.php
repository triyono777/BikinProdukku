<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';

	protected $guarded = ['id_testi'];
}

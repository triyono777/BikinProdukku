<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';

	protected $guarded = ['id_testi'];

	public function pengguna() {
		return $this->belongsTo('App\Models\Pengguna\Pengguna', 'id_user', 'id_user');
	}
}

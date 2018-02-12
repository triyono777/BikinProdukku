<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';

	protected $guarded = [''];

	protected $primaryKey = 'id_testi';

	public $incrementing = false;


	public function pengguna() {
		return $this->belongsTo('App\Models\Pengguna\Pengguna', 'id_user', 'id_user');
	}
}

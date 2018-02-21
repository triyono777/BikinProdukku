<?php

namespace App\Models\Varian;

use Illuminate\Database\Eloquent\Model;

class TransVarian extends Model
{
    protected $table = 'trans_varian';

    protected $guarded = ['id'];

    public function varian() {
    	return $this->belongsTo('App\Models\Varian\VarianRasa', 'varian_id', 'id');
    }
}

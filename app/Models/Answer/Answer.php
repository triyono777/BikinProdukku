<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';

    protected $guarded = ['id_answer'];

    public function user() {
    	return $this->belongsTo('App\Models\Pengguna\Pengguna', 'id_user', 'id_user');
    }
}

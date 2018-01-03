<?php

namespace App\Models\Answer;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';

    protected $guarded = ['id_answer'];
}

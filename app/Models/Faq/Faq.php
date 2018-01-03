<?php

namespace App\Models\Faq;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $guarded = ['id_faq'];
}

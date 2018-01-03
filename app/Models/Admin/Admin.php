<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $guarded = ['id_admin'];
}

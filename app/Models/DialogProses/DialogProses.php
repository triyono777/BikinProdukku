<?php

namespace App\Models\DialogProses;

use Illuminate\Database\Eloquent\Model;

class DialogProses extends Model
{
    protected $table = 'dialog_proses';

    protected $guarded = ['id_dialog'];

    protected $primaryKey = 'id_dialog';
}

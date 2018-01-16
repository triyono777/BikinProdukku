<?php

namespace App\Models\Pengguna;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
	use Notifiable;

    protected $table = 'pengguna';

    protected $guarded = [''];

    public function transaksi() {
    	return $this->hasMany('App\Transaksi\Transaksi', 'id_user', 'id_user');
    }
}

<?php

namespace App\Models\Pengguna;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
	use Notifiable;

    protected $table = 'pengguna';

    protected $guarded = [''];

    protected $primaryKey = 'id_user';

    public $incrementing = false;

    public function transaksi() {
    	return $this->hasMany('App\Models\Transaksi\Transaksi', 'id_user', 'id_user');
    }

    public function username() {
    	return $this->username;
    }

    public function id_user() {
    	return $this->id_user;
    }
}

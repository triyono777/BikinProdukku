<?php

use App\Helpers\AutoNumber;
use Faker\Generator as Faker;

$factory->define(App\Models\Admin\Admin::class, function (Faker $faker) {
    return [
        'id_admin' => AutoNumber::autoNumberAdmin('admin', 'id_admin', 'A'),
    	'nama' => 'admin',
    	'username' => 'admin',
    	'password' => bcrypt('admin'),
    	'jabatan' => 'admin',
    	'img' => ''
    ];
});

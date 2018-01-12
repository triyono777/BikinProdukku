<?php

use App\Helpers\AutoNumber;
use Faker\Generator as Faker;

$factory->define(App\Models\Pengguna\Pengguna::class, function (Faker $faker) {
    return [
        'id_user' => AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P');
        'nama' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->email,
        'whatsapp' => $faker->phoneNumber,
        'password' => bcrypt($faker->password),
        'jabatan' => 'Jabatan ' . $key,
        'img' => $faker->imageUrl,
    ];
});

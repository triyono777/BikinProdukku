<?php

use App\Helpers\AutoNumber;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
		'kode_invoice' => AutoNumber::autoNumberTransaksi('transaksi', 'kode_invoice', 'INV'),
		'id_user' =>
		'total' =>
		'status' =>
		'gambar_bukti' =>
		'tanggal' =>
    ];
});


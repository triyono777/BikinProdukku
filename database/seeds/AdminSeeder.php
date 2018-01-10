<?php

use App\Helpers\AutoNumber;
use App\Models\Admin\Admin;
use App\Models\Pengguna\Pengguna;
use App\Models\Transaksi\Transaksi;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
        	'id_admin' => AutoNumber::autoNumberAdmin('admin', 'id_admin', 'A'),
        	'nama' => 'admin',
        	'username' => 'admin',
        	'password' => bcrypt('admin'),
        	'jabatan' => 'admin',
        	'img' => ''
        ]);

        $faker = Faker::create();
        foreach (range(1, 10) as $key => $value) {
            $pengguna = new Pengguna;
            $pengguna->id_user =  AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P');

                $transaksi = new Transaksi;
                $transaksi->kode_invoice = AutoNumber::autoNumberTransaksi('transaksi', 'kode_invoice', 'INV');
                $transaksi->id_user = $pengguna->id_user;
                $transaksi->total = 100000;
                $transaksi->status = 0;
                $transaksi->gambar_bukti = 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb';
                $transaksi->tanggal = date('Y-m-d');
                $transaksi->save();

            $pengguna->nama = $faker->name;
            $pengguna->username = $faker->username;
            $pengguna->email = $faker->email;
            $pengguna->whatsapp = $faker->phoneNumber;
            $pengguna->password = bcrypt($faker->password);
            $pengguna->jabatan = 'Jabatan ' . $key;
            $pengguna->img = $faker->imageUrl;
            $pengguna->save();
            // Pengguna::create([
            //     'id_user' => AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P'),
            //     'nama' => $faker->name,
            //     'username' => $faker->username,
            //     'email' => $faker->email,
            //     'whatsapp' => $faker->phoneNumber,
            //     'password' => bcrypt($faker->password),
            //     'jabatan' => 'Jabatan ' . $key,
            //     'img' => $faker->imageUrl,
            // ]);
        }
    }
}

<?php

use App\Helpers\AutoNumber;
use App\Models\Admin\Admin;
use App\Models\Pengguna\Pengguna;
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
            Pengguna::create([
                'id_user' => AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P'),
                'nama' => $faker->name,
                'username' => $faker->username,
                'email' => $faker->email,
                'whatsapp' => $faker->phoneNumber,
                'password' => bcrypt($faker->password),
                'jabatan' => 'Jabatan ' . $key,
                'img' => $faker->imageUrl,
            ]);
        }
    }
}

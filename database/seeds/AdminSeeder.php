<?php

use App\Helpers\AutoNumber;
use App\Models\Admin\Admin;
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
    }
}

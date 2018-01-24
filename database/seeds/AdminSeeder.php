<?php

use App\Helpers\AutoNumber;
use App\Models\Admin\Admin;
use App\Models\Kategori\Kategori;
use App\Models\Kategori\SubKategori;
use App\Models\Pengguna\Pengguna;
use App\Models\Tracking\Tracking;
use App\Models\Transaksi\DetailTransaksi;
use App\Models\Transaksi\SubDetailTransaksi;
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
        $this->command->info('Data Di hapus');

        Admin::truncate();
        Pengguna::truncate();
        Transaksi::truncate();
        DetailTransaksi::truncate();
        Tracking::truncate();
        Kategori::truncate();
        SubKategori::truncate();

        $this->command->info('Data Sedang Dibuat');


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
            $this->command->info($key);
            $pengguna = new Pengguna;
            $pengguna->id_user =  AutoNumber::autoNumberPengguna('pengguna', 'id_user', 'P');

                $transaksi = new Transaksi;
                $transaksi->kode_invoice = AutoNumber::autoNumberTransaksi('transaksi', 'kode_invoice', 'INV');
                $transaksi->id_user = $pengguna->id_user;
                $transaksi->total = 100000;
                $transaksi->status = 0;
                $transaksi->gambar_bukti = 'https://images.pexels.com/photos/9754/mountains-clouds-forest-fog.jpg?w=100&h=100&auto=compress&cs=tinysrgb';
                $transaksi->tanggal = date('Y-m-d');

                    $detailTransaksi = new DetailTransaksi;
                    $detailTransaksi->kode_invoice = $transaksi->kode_invoice;
                    $detailTransaksi->nama_produk = 'Produk '. $key;
                    $detailTransaksi->gambar_produk = $faker->imageUrl;
                    $detailTransaksi->biaya_kirim = '100000';
                    $detailTransaksi->subtotal = '100000';
                    $detailTransaksi->caption = $faker->sentence;

                        $subDetailTransaksi = new SubDetailTransaksi;
                        $subDetailTransaksi->kode_detail = ++$key;
                        $subDetailTransaksi->nama_bahan = 'Bahan '.$key;
                        $subDetailTransaksi->jumlah = (1+$key);
                        $subDetailTransaksi->subtotal = 50000;


                    $tracking = new Tracking;
                    $tracking->kode_invoice = $transaksi->kode_invoice;
                    $tracking->pembelian_bahan_baku = 1;
                    $tracking->cetak_kemasan = 0;
                    $tracking->produksi = 0;
                    $tracking->qc = 0;
                    $tracking->pengiriman = 0;

            $pengguna->nama = $faker->firstName;
            $pengguna->username = $faker->username(2,10);
            $pengguna->email = $faker->email;
            $pengguna->whatsapp = $faker->phoneNumber;
            $pengguna->password = bcrypt('pengguna');
            $pengguna->status = 'Jabatan ' . $key;
            $pengguna->img = $faker->imageUrl;

            // kategori
            $kategori = new Kategori;
            $kategori->nama_kategori = 'Kategori '. $key;

            // sub kategori
            $subKategori = new SubKategori;
            $subKategori->id_kategori = $key;
            $subKategori->nama_subKategori = 'sub kategori '.$key;


            $kategori->save();
            $subKategori->save();
            $pengguna->save();
            $tracking->save();
            $detailTransaksi->save();
            $subDetailTransaksi->save();
            $transaksi->save();
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

            $this->command->info('Data Sudah dibuat');

    }
}

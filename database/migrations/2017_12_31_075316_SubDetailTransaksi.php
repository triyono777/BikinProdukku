<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubDetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_detail_transaksi', function (Blueprint $table) {
            $table->increments('kode_sub', 8);
            $table->integer('kode_detail');
            $table->string('nama_bahan', 25);
            $table->string('gambar_produk')->nullable();
            $table->string('gambar_logo')->nullable();
            $table->string('gambar_sendiri')->nullable();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_detail_transaksi');
    }
}

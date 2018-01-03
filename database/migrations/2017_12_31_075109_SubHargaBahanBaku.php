<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubHargaBahanBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_harga_bahan_baku', function (Blueprint $table) {
            $table->increments('kode_harga', 8);
            $table->char('kode_bahan', 8);
            $table->integer('id_satuan');
            $table->string('nama_supplier', 25);
            $table->integer('harga');
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
        Schema::dropIfExists('sub_harga_bahan_baku');
    }
}

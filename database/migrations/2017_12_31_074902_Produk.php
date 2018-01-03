<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->char('kode_produk', 8);
            $table->primary('kode_produk');
            $table->integer('id_kategori');
            $table->string('nama_produk', 25);
            $table->integer('biaya_operasional');
            $table->boolean('sold_out')->default(false);
            $table->boolean('perbesar')->default(false);
            $table->text('caption');
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
        Schema::dropIfExists('produk');
    }
}

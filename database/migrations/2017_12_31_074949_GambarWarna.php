<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GambarWarna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_warna', function (Blueprint $table) {
            $table->increments('kode_warna', 8);
            $table->integer('kode_template');
            $table->text('gambar_template');
            $table->text('caption');
            $table->boolean('sold_out')->default(false);
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
        Schema::dropIfExists('gambar_warna');
    }
}

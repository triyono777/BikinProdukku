<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GambarTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_template', function (Blueprint $table) {
            $table->increments('kode_template', 8);
            $table->integer('kode_gambar');
            $table->text('gambar_template');
            $table->text('caption');
            $table->boolean('sold_out');
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
        Schema::dropIfExists('gambar_template');
    }
}

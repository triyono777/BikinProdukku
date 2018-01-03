<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tracking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking', function (Blueprint $table) {
            $table->char('kode_invoice', 13);
            $table->primary('kode_invoice');
            $table->boolean('pembelian_bahan_baku')->default(false);
            $table->boolean('cetak_kemasan')->default(false);
            $table->boolean('produksi')->default(false);
            $table->boolean('qc')->default(false);
            $table->boolean('finishing')->default(false);
            $table->boolean('pengiriman')->default(false);
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
        Schema::dropIfExists('tracking');
    }
}

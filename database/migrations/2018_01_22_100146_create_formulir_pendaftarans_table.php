<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulirPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir_pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama_lengkap', 50);
            $table->string('tempat', 50);
            $table->date('tgl_lahir', 50);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('status_perkawinan', 50);
            $table->string('pekerjaan', 50);
            $table->text('alamat');
            $table->text('foto');
            $table->string('motivasi_berbisnis');
            $table->string('hobi', 50);            
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
        Schema::dropIfExists('formulir_pendaftarans');
    }
}

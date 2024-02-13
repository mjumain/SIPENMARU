<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_mahasiswa')->nullable();
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('npsn')->nullable();
            $table->string('nomor_registrasi_kipk')->nullable();
            $table->string('hp')->nullable();
            $table->string('kk')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('pendukung')->nullable();
            $table->string('has_prodi_kelas_jalur')->nullable();
            $table->string('refferal')->nullable();
            $table->string('validasi_admisi')->nullable();
            $table->string('validasi_akademik')->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};

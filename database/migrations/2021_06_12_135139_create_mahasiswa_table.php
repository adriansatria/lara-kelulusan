<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 10);
            $table->string('foto', 255);
            $table->string('nama', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 10);
            $table->string('asal_sekolah', 100);
            $table->string('jenis_kelamin', 20);
            $table->string('golongan_darah', 5);
            $table->string('alamat', 255);
            $table->string('nama_ortu', 100);
            $table->string('pendidikan_terakhir', 50);
            $table->string('pekerjaan', 50);
            $table->string('keterangan', 255);
            $table->string('tahun_akademik', 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}

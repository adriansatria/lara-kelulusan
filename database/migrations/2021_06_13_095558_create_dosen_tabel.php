<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen', 50);
            $table->string('nip', 20);
            $table->string('jabatan_struktural', 50);
            $table->string('pangkat_golongan', 50);
            $table->string('jabatan_fungsional', 100);
            $table->string('tmt', 50);
            $table->string('notelp', 15);
            $table->string('nidn_nidk', 50);
            $table->string('homebase_prodi', 50);
            $table->string('serdos', 50);
            $table->string('keterangan', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
}

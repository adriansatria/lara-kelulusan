<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportf2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportf2s', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 10);
            $table->string('nama_mahasiswa', 50);
            $table->string('izin', 10);
            $table->string('tidak_izin', 10);
            $table->string('jumlah', 10);
            $table->string('kelakuan', 30);
            $table->string('status_lulus_lalu', 10);
            $table->string('status_lulus_baru', 10);
            $table->integer('amxsks');
            $table->float('ip', 8, 2);
            $table->string('kapita_selekta2', 5);
            $table->string('k3', 5);
            $table->string('metodologi_penelitian2', 5);
            $table->string('k2', 5);
            $table->string('bahasa_inggris_komunikasi3', 5);
            $table->string('k2_2', 5);
            $table->string('tugas_akhir', 5);
            $table->string('k6', 5);
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
        Schema::dropIfExists('reportf2s');
    }
}

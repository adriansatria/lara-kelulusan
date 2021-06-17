<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportf1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportf1s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen', 100);
            $table->string('nip', 20);
            $table->string('mata_kuliah', 50);
            $table->string('p1', 10)->nullable();
            $table->string('p2', 10)->nullable();
            $table->string('p3', 10)->nullable();
            $table->string('p4', 10)->nullable();
            $table->string('p5', 10)->nullable();
            $table->string('p6', 10)->nullable();
            $table->string('p7', 10)->nullable();
            $table->string('p8', 10)->nullable();
            $table->string('p9', 10)->nullable();
            $table->string('p10', 10)->nullable();
            $table->string('p11', 10)->nullable();
            $table->string('p12', 10)->nullable();
            $table->string('p13', 10)->nullable();
            $table->string('p14', 10)->nullable();
            $table->string('p15', 10)->nullable();
            $table->string('p16', 10)->nullable();
            $table->string('p17', 10)->nullable();
            $table->string('p18', 10)->nullable();
            $table->string('p19', 10)->nullable();
            $table->string('prosentase_hadir', 10);
            $table->string('prosentase_tidakhadir', 10);
            $table->string('hadir', 10)->nullable();
            $table->string('izin', 10)->nullable();
            $table->string('keluar_dinas', 10)->nullable();
            $table->string('mangkir', 10)->nullable();
            $table->string('sakit', 10)->nullable();
            $table->string('tahun', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportf1s');
    }
}

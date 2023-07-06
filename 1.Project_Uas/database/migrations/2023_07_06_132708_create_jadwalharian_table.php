<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalharian', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_SISWA');
            $table->foreign('ID_SISWA')->references('ID')->on('mahasiswa');
            $table->date('HARI');
            $table->string('KEGIATAN');
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
        Schema::dropIfExists('jadwalharian');
    }
}

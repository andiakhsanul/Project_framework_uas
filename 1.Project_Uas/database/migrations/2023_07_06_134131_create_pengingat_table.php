<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengingatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengingat', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_SISWA');
            $table->foreign('ID_SISWA')->references('ID')->on('mahasiswa');
            $table->dateTime('TANGGAL_PENG');
            $table->string('KETERANGAN');
            $table->string('JUDUL_PENGINGAT');
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
        Schema::dropIfExists('pengingat');
    }
}

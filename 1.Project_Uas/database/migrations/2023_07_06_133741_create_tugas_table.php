<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('ID_JADWALHARIAN');
            $table->foreign('ID_JADWALHARIAN')->references('ID')->on('jadwalharian');
            $table->unsignedInteger('ID_SISWA');
            $table->foreign('ID_SISWA')->references('ID')->on('mahasiswa');
            $table->string('DESK_TUGAS');
            $table->dateTime('TENGGAT_WAKTU');
            $table->boolean('STATUS');
            $table->string('CATATAN')->nullable();
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
        Schema::dropIfExists('tugas');
    }
}

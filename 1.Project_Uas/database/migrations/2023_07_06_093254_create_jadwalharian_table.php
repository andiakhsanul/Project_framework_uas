<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalHarianTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwalharian', function (Blueprint $table) {
            $table->increments('ID_JADWALHARIAN');
            $table->integer('ID_SISWA');
            $table->string('HARI', 10);
            $table->string('KEGIATAN', 30);
            $table->timestamps();
            $table->primary('ID_JADWALHARIAN');
            $table->foreign('ID_SISWA')->references('ID_SISWA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalharian');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('ID_SISWA');
            $table->string('NAMA', 20);
            $table->string('NIS', 20);
            $table->string('ALAMAT', 30);
            $table->string('EMAIL', 30);
            $table->string('PASSWORD', 30);
            $table->timestamps();
            $table->primary('ID_SISWA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
}

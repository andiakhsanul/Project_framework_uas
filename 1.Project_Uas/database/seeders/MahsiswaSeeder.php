<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahsiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'NAMA' => 'bima sipaling laravel',
            'NIM' => '1129321',
            'ALAMAT' => 'jalan laravel',
            'EMAIL' => 'dummy@email.com',
            'PASSWORD' => '123',
        ]);
        DB::table('mahasiswa')->insert([
            'NAMA' => 'spaling elit bim',
            'NIM' => '112932112',
            'ALAMAT' => 'jalan laravel',
            'EMAIL' => 'dummy@email.com',
            'PASSWORD' => '123',
        ]);
    }
}

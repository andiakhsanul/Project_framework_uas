<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'catatan'; // Ganti 'catatan' dengan nama tabel yang sesuai

    protected $fillable = [
        'hari',
        'kegiatan',
    ];

    // Tambahkan relasi atau method lainnya sesuai kebutuhan Anda
}

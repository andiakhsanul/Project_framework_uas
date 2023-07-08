<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'NAMA',
        'NIS',
        'ALAMAT',
        'EMAIL',
        'PASSWORD',
    ];
    protected $guarded = [
        "ID",
    ];


    protected $hidden = [
        'PASSWORD',
    ];

    protected $casts = [
        'ID' => 'integer',
    ];

    // Jika diperlukan, Anda dapat menambahkan relasi atau metode lain di sini
}

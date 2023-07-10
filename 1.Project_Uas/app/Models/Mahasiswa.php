<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'NAMA',
        'NIM',
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
}

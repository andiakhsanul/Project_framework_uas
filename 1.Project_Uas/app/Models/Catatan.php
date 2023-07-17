<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'jadwalharian'; // Ganti 'catatan' dengan nama tabel yang sesuai
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'hari',
        'kegiatan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

}
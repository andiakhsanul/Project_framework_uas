<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'deskripsi' => 'required|string|max:255',
            'tenggat_waktu' => 'required|date',
            'status' => 'required|boolean',
            'jadwalHarianId' => 'required',
            'mahasiswaId' => 'required',
        ]);

        $jadwalHarianId = $validatedData['jadwalHarianId'];
        $mahasiswaId = $validatedData['mahasiswaId'];

        // Membuat instance Tugas dan mengisi atribut-atributnya
        $tugas = new Tugas();
        $tugas->DESK_TUGAS = $validatedData['deskripsi'];
        $tugas->TENGGAT_WAKTU = $validatedData['tenggat_waktu'];
        $tugas->STATUS = $validatedData['status'];

        // Assign relasi dengan jadwal harian dan mahasiswa, sesuaikan dengan hubungan antar model
        $tugas->jadwalHarian()->associate($jadwalHarianId);
        $tugas->mahasiswa()->associate($mahasiswaId);

        $tugas->save();

        // Redirect ke halaman yang sesuai setelah menyimpan tugas
        return redirect()->route('home')->with('success', 'Tugas berhasil disimpan.');
    }
}

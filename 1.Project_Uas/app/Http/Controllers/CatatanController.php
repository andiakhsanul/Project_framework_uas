<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'hari' => 'required|date',
            'kegiatan' => 'required|string|max:255',
        ]);

        $catatan = Auth::user()->catatans()->create([
            'hari' => $validatedData['hari'],
            'kegiatan' => $validatedData['kegiatan'],
        ]);

        $catatan->save();

        // Redirect ke halaman yang sesuai setelah menyimpan catatan
        return redirect()->route('home')->with('success', 'Catatan harian berhasil disimpan.');
    }
}
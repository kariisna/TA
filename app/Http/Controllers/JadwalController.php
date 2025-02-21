<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa' => 'required|string|max:255',
        ]);

        Jadwal::create([
            'tanggal' => $request->tanggal,
            'siswa' => $request->siswa,
        ]);

        return redirect()->route('dashboard')->with('success', 'Jadwal berhasil dibuat!');
    }
}

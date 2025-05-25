<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2048',
            'lokasi' => 'required|string|max:255',
            'tanggal_kejadian' => 'required|date',
        ]);

        // Simpan foto ke storage
        $path = $request->file('foto')->store('public/foto_laporan');

        // Simpan data lapor (contoh, bisa disesuaikan dengan model database)
        // Laporan::create([
        //     'foto_path' => $path,
        //     'lokasi' => $request->lokasi,
        //     'tanggal_kejadian' => $request->tanggal_kejadian,
        // ]);

        return redirect()->route('laporan.create')->with('success', 'Laporan berhasil dikirim!');
    }
}
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'lokasi' => 'required|string|max:255',
            'tanggal_kejadian' => 'required|date',
        ], [
            'foto.required' => 'Foto kejadian wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar diperbolehkan: jpeg, png, jpg, gif, svg, webp.',
        ]);

        try {
            $filename = null;

            if ($request->hasFile('foto')) {
                $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('public/foto_laporan', $filename);
            }

            Laporan::create([
                'foto' => $path ?? null,
                'lokasi' => $request->lokasi,
                'tanggal_kejadian' => $request->tanggal_kejadian,
            ]);

            return redirect()->route('laporan.create')->with('success', 'Laporan berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengunggah laporan: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
        $semuaBerita = Berita::latest()->get();
        return view('berita.index', compact('semuaBerita'));
    }

    public function create() {
        return view('berita.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul'  => 'required|max:255', // Ini membatasi 255 karakter teks judul
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240', // INI YANG PENTING! 10240 KB = 10 MB
        ]);

        $pathGambar = $request->hasFile('gambar') ? $request->file('gambar')->store('berita', 'public') : null;

        Berita::create([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul),
            'isi'    => $request->isi,
            'gambar' => $pathGambar, 
        ]);

        return redirect()->route('berita.index')->with('status', 'Berita berhasil diterbitkan!');
    }

    public function show($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.show', compact('berita'));
    }

    public function edit($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) { Storage::disk('public')->delete($berita->gambar); }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->judul = $request->judul;
        $berita->slug  = Str::slug($request->judul);
        $berita->isi   = $request->isi;
        $berita->save();

        return redirect()->route('berita.index')->with('status', 'Berita berhasil diupdate!');
    }

    public function destroy($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        if ($berita->gambar) { Storage::disk('public')->delete($berita->gambar); }
        $berita->delete();
        return redirect()->route('berita.index')->with('status', 'Berita berhasil dihapus!');
    }
}
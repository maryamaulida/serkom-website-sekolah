<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::all();

        return view('admin.ekskul.index', compact('ekskuls'));
    }

    public function create()
    {
        return view('admin.ekskul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string',
            'nama_pembina' => 'required|string',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('ekskul', 'public');
        }

        Ekskul::create([
            'nama_eskul' => $request->nama_eskul,
            'nama_pembina' => $request->nama_pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data Ekskul Berhasil Ditambahkan');
    }

    public function show(Ekskul $ekskul)
    {
        return view('admin.ekskul.show', compact('ekskul'));
    }

    public function edit(Ekskul $ekskul)
    {
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    public function update(Request $request, Ekskul $ekskul)
    {
        $request->validate([
            'nama_eskul' => 'required|string',
            'nama_pembina' => 'required|string',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('ekskul', 'public');
            $ekskul->gambar = $gambar;
        }

        $ekskul->update([
            'nama_eskul' => $request->nama_eskul,
            'nama_pembina' => $request->nama_pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data Ekskul Berhasil Di Update');
    }

    public function destroy(Ekskul $ekskul)
    {
        $ekskul->delete();

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data Ekskul Berhasil Dihapus');
    }
}

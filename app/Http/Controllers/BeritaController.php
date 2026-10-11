<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required',
            'slug' => 'required|unique:berita,slug'
        ],[
            'judul.required' => 'Judul berita harus diisi.',
            'judul.max' => 'Judul berita tidak boleh lebih dari 50 karakter.',
            'isi.required' => 'Isi berita harus diisi.',
            'tanggal.required' => 'Tanggal berita harus diisi.',
            'tanggal.date' => 'Tanggal berita harus berupa tanggal yang valid.',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format: jpeg, png, jpg, gif, svg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'slug.unique' => 'Slug berita sudah digunakan. Silakan gunakan judul yang berbeda.',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'id_berita' => Str::uuid(),
            'judul' => $request->judul,
            'slug' =>$slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita Berhasil Ditambahkan');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambar;
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita Berhasil Di Update');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita Berhasil Dihapus');
    }
}

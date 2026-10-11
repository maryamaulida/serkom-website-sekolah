<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    private function cekAkses(Berita $berita): void
    {
        $user = Auth::user();

        abort_unless($user, 403);

        if (
            $user->role !== 'Admin' &&
            $berita->created_by !== $user->id_user
        ) {
            abort(403, 'Kamu tidak memiliki akses ke berita ini.');
        }
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'Admin') {
            $beritas = Berita::latest()->get();
        } else {
            $beritas = Berita::where(
                'created_by',
                $user->id_user
            )->latest()->get();
        }

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
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'slug' => 'required|unique:berita,slug',
        ], [
            'judul.required' => 'Judul berita harus diisi.',
            'judul.max' => 'Judul berita maksimal 255 karakter.',
            'isi.required' => 'Isi berita harus diisi.',
            'tanggal.required' => 'Tanggal berita harus diisi.',
            'tanggal.date' => 'Tanggal berita tidak valid.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus PNG, JPG, JPEG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'slug.unique' => 'Slug berita sudah digunakan.',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'id_berita' => (string) Str::uuid(),
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'status' => $request->status,
            'id_user' => Auth::user()->id_user,
            'created_by' =>Auth::user()->id_user,
        ]);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        $this->cekAkses($berita);

        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $this->cekAkses($berita);

        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $this->cekAkses($berita);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $slug = Str::slug($request->judul);

        $slugSudahAda = Berita::where('slug', $slug)
            ->where('id_berita', '!=', $berita->id_berita)
            ->exists();

        if ($slugSudahAda) {
            return back()
                ->withErrors([
                    'judul' => 'Judul berita tersebut sudah digunakan.',
                ])
                ->withInput();
        }

        $data = [
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        // ID pembuat tidak boleh berubah saat berita diedit.
        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $this->cekAkses($berita);

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('admin.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);

        $user = Auth::user();

        Pengumuman::create([
            'id_pengumuman' => Str::uuid(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->has('status')
                ? 'Publish'
                : 'Draft',
            'id_user' => $user->id_user,
        ]);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function show(Pengumuman $pengumuman)
    {
        return view(
            'admin.pengumuman.show',
            compact('pengumuman')
        );
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view(
            'admin.pengumuman.edit',
            compact('pengumuman')
        );
    }

    public function update(
        Request $request,
        Pengumuman $pengumuman
    ) {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->has('status')
                ? 'Publish'
                : 'Draft',
        ]);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}

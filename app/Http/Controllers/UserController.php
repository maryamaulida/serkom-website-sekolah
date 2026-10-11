<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount(['berita', 'pengumuman'])->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        User::create([
            'id_user' => Str::uuid(),
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
            'status' => 'Aktif',
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'nullable|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => $request->password,
            ]);
        }

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function myProfile()
    {
        $user = Auth::user();

        return view('admin.user.my-profile', compact('user'));
    }

    public function destroy(User $user)
    {
        $adaBerita = Berita::where('id_user', $user->id_user)->exists();

        $adaPengumuman = Pengumuman::where('id_user', $user->id_user)->exists();

        if ($adaBerita || $adaPengumuman) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'User tidak dapat dihapus karena sudah memiliki data.');
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dihapus.');
    }

    public function toggleStatus(User $user)
    {
        // Kalau user sedang login menonaktifkan akunnya sendiri
        if ($user->id_user === Auth::user()->id_user && $user->status === 'Aktif') {

            $user->update([
                'status' => 'Nonaktif'
            ]);

            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'username' => 'Akun kamu telah dinonaktifkan.',
                ]);
        }

        // Kalau menonaktifkan user lain
        if ($user->status === 'Aktif') {

            $user->update([
                'status' => 'Nonaktif'
            ]);

            return redirect()
                ->route('admin.user.index')
                ->with('success', 'User berhasil dinonaktifkan.');
        }

        // Kalau mengaktifkan user
        $user->update([
            'status' => 'Aktif'
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diaktifkan.');
    }
}

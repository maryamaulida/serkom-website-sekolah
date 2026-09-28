<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string',
            'kepala_sekolah' => 'required|string',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'logo' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
            'npsm' => 'required|numeric',
            'alamat' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tahun_berdiri' => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        $foto = $request->file('foto')->store('profile', 'public');
        $logo = $request->file('logo')->store('profile', 'public');

        Profile::create([
            'nama_sekolah' => $request->nama_sekolah,
            'kepala_Sekolah' => $request->kepala_sekolah,
            'foto' => $foto,
            'logo' => $logo,
            'npsn' => $request->npsm,
            'alamat' => $request->alamat,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('admin.profile.index')->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
            $request->validate([
                'nama_sekolah' => 'required|string',
                'kepala_sekolah' => 'required|string',
                'foto' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
                'npsm' => 'required|numeric',
                'alamat' => 'required',
                'visi' => 'required',
                'misi' => 'required',
                'tahun_berdiri' => 'required|numeric',
                'deskripsi' => 'required'
            ]);

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('profile', 'public');
                $profile->foto = $foto;
            }

            // Update logo kalau ada file baru
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo')->store('profile', 'public');
                $profile->logo = $logo;
            }

            $profile->update([
                'nama_sekolah' => $request->nama_sekolah,
                'kepala_Sekolah' => $request->kepala_sekolah,
                'npsn' => $request->npsm,
                'alamat' => $request->alamat,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'tahun_berdiri' => $request->tahun_berdiri,
                'deskripsi' => $request->deskripsi
            ]);

            return redirect()->route('admin.profile.index')->with('success', 'Data Berhasil Di Update');

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('admin.profile.index')->with('success', 'Data Berhasil Di Update');
    }
}

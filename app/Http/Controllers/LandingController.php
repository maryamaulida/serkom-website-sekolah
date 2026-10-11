<?php

namespace App\Http\Controllers;
// use function view;

// use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Profile;
use App\Models\Siswa;

class LandingController extends Controller
{
    public function index()
    {
       $beritas = Berita::where('status', 'Publish')->latest()->take(2)->get();
       $pengumumans = Pengumuman::where('status', 'Publish')->latest()->take(4)->get();
       $gurus = Guru::all();
       $prestasis = Prestasi::all();
       $ekskul = Ekskul::all();
       $galeris = Galeri::all();
       $jumlahSiswa = Siswa::count();
       $jumlahGuru = Guru::count();
       $jumlahPrestasi = Prestasi::count();


       return view('landing.index', compact(
        'beritas',
        'pengumumans',
        'gurus',
        'prestasis',
        'ekskul',
        'galeris',
        'jumlahSiswa',
        'jumlahGuru',
        'jumlahPrestasi'
        ));
    }

    public function profile(){
        $profile = Profile::first();
        return view('landing.profile', compact('profile'));
    }

    public function berita(){
        $beritas = Berita::where('status', 'Publish')->latest()->get();
        return view('landing.berita.index', compact('beritas'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'Publish')->firstOrFail();

        return view('landing.berita.detail', compact('berita'));
    }

    public function guru(){
        $gurus = Guru::latest()->get();
        return view('landing.guru.index', compact('gurus'));
    }

    public function guruDetail($id_guru){
        $guru = Guru::where('id_guru', $id_guru)->firstOrFail();
        return view('landing.guru.detail', compact('guru'));
    }

    public function prestasi(){
        $prestasis = Prestasi::latest()->get();
        return view('landing.prestasi.index', compact('prestasis'));
    }

    public function detailPrestasi($id_prestasi){
        $prestasi = Prestasi::where('id_prestasi', $id_prestasi)->firstOrFail();
        return view('landing.prestasi.detail', compact('prestasi'));
    }

    public function galeri(){
        $galeris = Galeri::latest()->get();
        return view('landing.galeri.index', compact('galeris'));
    }

    public function detailGaleri($id_galeri){
        $galeri = Galeri::where('id_galeri', $id_galeri)->firstOrFail();
        return view('landing.galeri.detail', compact('galeri'));
    }

    public function pengumuman(){
        $pengumumans = Pengumuman::where('status', 'Publish')->latest()->get();
        return view('landing.pengumuman.index', compact('pengumumans'));
    }

    public function detailPengumuman($id_pengumuman){
        $pengumuman = Pengumuman::where('id_pengumuman', $id_pengumuman)->firstOrFail();
        return view('landing.pengumuman.detail', compact('pengumuman'));
    }

    public function eskul(){
        $eskuls = Ekskul::latest()->get();
        return view('landing.eskul.index', compact('eskuls'));
    }

    public function detailEskul($id_eskul){
        $eskul = Ekskul::where('id_ekskul', $id_eskul)->firstOrFail();
        return view('landing.eskul.detail', compact('eskul'));
    }


}

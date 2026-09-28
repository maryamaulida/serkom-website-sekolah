<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Ekskul;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\User;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // STATISTIK
        // =========================

        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalPrestasi = Prestasi::count();
        $totalEkskul = Ekskul::count();
        $totalBerita = Berita::count();
        $totalPengumuman = Pengumuman::count();
        $totalGaleri = Galeri::count();
        $totalUser = User::count();

        // =========================
        // PROFILE SEKOLAH
        // =========================

        $profile = Profile::first();

        // =========================
        // DATA TERBARU
        // =========================

        $prestasiTerbaru = Prestasi::latest()->take(5)->get();

        $beritaTerbaru = Berita::latest()->take(4)->get();

        $pengumumanTerbaru = Pengumuman::latest()->take(4)->get();

        $ekstrakurikuler = Ekskul::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'profile',
            'totalSiswa',
            'totalGuru',
            'totalPrestasi',
            'totalEkskul',
            'totalBerita',
            'totalPengumuman',
            'totalGaleri',
            'totalUser',
            'prestasiTerbaru',
            'beritaTerbaru',
            'pengumumanTerbaru',
            'ekstrakurikuler'
        ));
    }
}

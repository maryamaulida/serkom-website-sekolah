@extends('layouts.admin')

@section('content')

<div class="container-fluid">
<div class="mb-4">
    <h4 class="fw-semibold mb-1">Dashboard</h4>
    <p class="fs-3 text-muted mb-0">
        Ringkasan data {{ $profile->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
        &middot; {{ now()->translatedFormat('d F Y') }}
    </p>
</div>


{{-- ========================================================= --}}
{{-- ROW 1 : CARD STATISTIK --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- BERITA --}}
    <div class="col-sm-6 col-xl-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="mb-1 text-muted fs-3">
                            Berita
                        </p>

                        <h4 class="fw-semibold mb-0">
                            {{ $totalBerita }}
                        </h4>

                        <p class="mb-0 fs-2 text-muted">
                            Data berita
                        </p>
                    </div>

                    <span class="round-45 bg-light-primary rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ti ti-news text-primary fs-6"></i>
                    </span>

                </div>

                <a href="{{ route('admin.berita.index') }}"
                   class="text-primary fs-2 text-decoration-none mt-3 d-inline-block">
                    Lihat berita →
                </a>

            </div>
        </div>
    </div>


    {{-- PENGUMUMAN --}}
    <div class="col-sm-6 col-xl-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="mb-1 text-muted fs-3">
                            Pengumuman
                        </p>

                        <h4 class="fw-semibold mb-0">
                            {{ $totalPengumuman }}
                        </h4>

                        <p class="mb-0 fs-2 text-muted">
                            Data pengumuman
                        </p>
                    </div>

                    <span class="round-45 bg-light-warning rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ti ti-speakerphone text-warning fs-6"></i>
                    </span>

                </div>

                <a href="{{ route('admin.pengumuman.index') }}"
                   class="text-warning fs-2 text-decoration-none mt-3 d-inline-block">
                    Lihat pengumuman →
                </a>

            </div>
        </div>
    </div>


    {{-- PRESTASI --}}
    <div class="col-sm-6 col-xl-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="mb-1 text-muted fs-3">
                            Prestasi
                        </p>

                        <h4 class="fw-semibold mb-0">
                            {{ $totalPrestasi }}
                        </h4>

                        <p class="mb-0 fs-2 text-muted">
                            Data prestasi
                        </p>
                    </div>

                    <span class="round-45 bg-light-success rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ti ti-trophy text-success fs-6"></i>
                    </span>

                </div>

                <a href="{{ route('admin.prestasi.index') }}"
                   class="text-success fs-2 text-decoration-none mt-3 d-inline-block">
                    Lihat prestasi →
                </a>

            </div>
        </div>
    </div>


    {{-- GALERI --}}
    <div class="col-sm-6 col-xl-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="mb-1 text-muted fs-3">
                            Galeri
                        </p>

                        <h4 class="fw-semibold mb-0">
                            {{ $totalGaleri }}
                        </h4>

                        <p class="mb-0 fs-2 text-muted">
                            Data galeri
                        </p>
                    </div>

                    <span class="round-45 bg-light-info rounded-circle d-flex align-items-center justify-content-center">
                        <i class="ti ti-photo text-info fs-6"></i>
                    </span>

                </div>

                <a href="{{ route('admin.galeri.index') }}"
                   class="text-info fs-2 text-decoration-none mt-3 d-inline-block">
                    Lihat galeri →
                </a>

            </div>
        </div>
    </div>

</div>


{{-- ========================================================= --}}
{{-- ROW 2 : STATISTIK SEKOLAH + EKSKUL --}}
{{-- ========================================================= --}}

<div class="row mt-4">

    {{-- STATISTIK SEKOLAH --}}
    <div class="col-lg-8 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h5 class="fw-semibold mb-1">
                            Statistik Sekolah
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Ringkasan data sekolah
                        </p>
                    </div>
                </div>


                <div class="row">

                    {{-- SISWA --}}
                    <div class="col-md-4 mb-3">
                        <div class="p-3 rounded-3"
                             style="background:#F3F0FF;">

                            <div class="d-flex align-items-center">

                                <span class="round-40 bg-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <i class="ti ti-users text-primary fs-6"></i>
                                </span>

                                <div>
                                    <p class="mb-0 fs-2 text-muted">
                                        Siswa
                                    </p>

                                    <h5 class="fw-semibold mb-0">
                                        {{ $totalSiswa }}
                                    </h5>
                                </div>

                            </div>

                        </div>
                    </div>


                    {{-- GURU --}}
                    <div class="col-md-4 mb-3">
                        <div class="p-3 rounded-3"
                             style="background:#E7F9F1;">

                            <div class="d-flex align-items-center">

                                <span class="round-40 bg-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <i class="ti ti-school text-success fs-6"></i>
                                </span>

                                <div>
                                    <p class="mb-0 fs-2 text-muted">
                                        Guru
                                    </p>

                                    <h5 class="fw-semibold mb-0">
                                        {{ $totalGuru }}
                                    </h5>
                                </div>

                            </div>

                        </div>
                    </div>


                    {{-- USER --}}
                    <div class="col-md-4 mb-3">
                        <div class="p-3 rounded-3"
                             style="background:#EAF3FF;">

                            <div class="d-flex align-items-center">

                                <span class="round-40 bg-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                    <i class="ti ti-user-check text-info fs-6"></i>
                                </span>

                                <div>
                                    <p class="mb-0 fs-2 text-muted">
                                        User
                                    </p>

                                    <h5 class="fw-semibold mb-0">
                                        {{ $totalUser }}
                                    </h5>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                {{-- DATA LAIN --}}
                <div class="row mt-2">

                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">

                            <span class="round-40 bg-light-warning rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="ti ti-target text-warning fs-6"></i>
                            </span>

                            <div>
                                <p class="mb-0 fs-2 text-muted">
                                    Ekstrakurikuler
                                </p>

                                <h6 class="fw-semibold mb-0">
                                    {{ $totalEkskul }} Ekstrakurikuler
                                </h6>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">

                            <span class="round-40 bg-light-success rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="ti ti-trophy text-success fs-6"></i>
                            </span>

                            <div>
                                <p class="mb-0 fs-2 text-muted">
                                    Prestasi
                                </p>

                                <h6 class="fw-semibold mb-0">
                                    {{ $totalPrestasi }} Prestasi
                                </h6>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>


    {{-- EKSTRAKURIKULER --}}
    <div class="col-lg-4 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div>
                        <h5 class="fw-semibold mb-1">
                            Ekstrakurikuler
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Kegiatan sekolah
                        </p>
                    </div>

                    <span class="badge bg-light-primary text-primary rounded-pill">
                        {{ $totalEkskul }}
                    </span>

                </div>


                <ul class="list-unstyled mb-0">

                    @forelse ($ekstrakurikuler as $ekskul)

                        <li class="d-flex align-items-center mb-3">

                            <span class="round-32 bg-light-warning rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="ti ti-target text-warning"></i>
                            </span>

                            <div>
                                <p class="mb-0 fs-3 fw-semibold">
                                    {{ $ekskul->nama_ekskul ?? $ekskul->nama_eskul ?? '-' }}
                                </p>

                                <p class="mb-0 fs-2 text-muted">
                                    Ekstrakurikuler sekolah
                                </p>
                            </div>

                        </li>

                    @empty

                        <li class="text-center py-4">

                            <i class="ti ti-target fs-7 text-muted"></i>

                            <p class="text-muted mb-0 mt-2">
                                Belum ada ekstrakurikuler
                            </p>

                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- ROW 3 : PRESTASI + BERITA --}}
{{-- ========================================================= --}}

<div class="row mt-4">

    {{-- PRESTASI --}}
    <div class="col-lg-7 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div>
                        <h5 class="fw-semibold mb-1">
                            Prestasi Terbaru
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Data prestasi sekolah
                        </p>
                    </div>

                    <a href="{{ route('admin.prestasi.index') }}"
                       class="fs-2 text-primary text-decoration-none">
                        Lihat semua
                    </a>

                </div>


                <div class="table-responsive">

                    <table class="table table-borderless align-middle text-nowrap">

                        <thead>
                            <tr>
                                <th>Prestasi</th>
                                <th>Tahun</th>
                                <th>Foto</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($prestasiTerbaru as $prestasi)

                                <tr>

                                    <td>
                                        <p class="mb-0 fw-semibold fs-3">
                                            {{ $prestasi->nama_prestasi }}
                                        </p>

                                        <p class="mb-0 fs-2 text-muted">
                                            {{ Str::limit($prestasi->deskripsi, 45) }}
                                        </p>
                                    </td>

                                    <td>
                                        <span class="badge bg-light-primary text-primary rounded-pill px-3 py-2">
                                            {{ $prestasi->tahun_ajaran }}
                                        </span>
                                    </td>

                                    <td>

                                        @if ($prestasi->foto)

                                            <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                                 alt="{{ $prestasi->nama_prestasi }}"
                                                 width="45"
                                                 height="45"
                                                 class="rounded-2 object-fit-cover">

                                        @else

                                            <span class="round-40 bg-light-secondary rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="ti ti-trophy text-secondary"></i>
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3"
                                        class="text-center text-muted py-4">
                                        Belum ada data prestasi.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- BERITA --}}
    <div class="col-lg-5 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div>
                        <h5 class="fw-semibold mb-1">
                            Berita Sekolah
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Berita terbaru
                        </p>
                    </div>

                    <a href="{{ route('admin.berita.index') }}"
                       class="fs-2 text-primary text-decoration-none">
                        Lihat semua
                    </a>

                </div>


                <ul class="list-unstyled mb-0">

                    @forelse ($beritaTerbaru as $berita)

                        <li class="d-flex align-items-start mb-3 pb-3 border-bottom">

                            <span class="round-40 bg-light-info rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0">

                                <i class="ti ti-news text-info fs-6"></i>

                            </span>

                            <div>

                                <p class="mb-1 fs-3 fw-semibold">
                                    {{ Str::limit($berita->judul, 40) }}
                                </p>

                                <p class="mb-0 fs-2 text-muted">

                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}

                                    <span class="mx-1">•</span>

                                    <span class="
                                        {{ $berita->status == 'Publish'
                                            ? 'text-success'
                                            : 'text-warning'
                                        }}">
                                        {{ $berita->status }}
                                    </span>

                                </p>

                            </div>

                        </li>

                    @empty

                        <li class="text-center py-4">

                            <i class="ti ti-news fs-7 text-muted"></i>

                            <p class="text-muted mb-0 mt-2">
                                Belum ada berita.
                            </p>

                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- ROW 4 : PENGUMUMAN + PROFIL SEKOLAH --}}
{{-- ========================================================= --}}

<div class="row mt-4">

    {{-- PENGUMUMAN --}}
    <div class="col-lg-7 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div>
                        <h5 class="fw-semibold mb-1">
                            Pengumuman Terbaru
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Informasi terbaru sekolah
                        </p>
                    </div>

                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="fs-2 text-primary text-decoration-none">
                        Lihat semua
                    </a>

                </div>


                <ul class="list-unstyled mb-0">

                    @forelse ($pengumumanTerbaru as $pengumuman)

                        <li class="d-flex align-items-start mb-3 pb-3 border-bottom">

                            <span class="round-40 bg-light-warning rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0">

                                <i class="ti ti-speakerphone text-warning fs-6"></i>

                            </span>

                            <div class="flex-grow-1">

                                <p class="mb-1 fs-3 fw-semibold">
                                    {{ $pengumuman->judul }}
                                </p>

                                <p class="mb-0 fs-2 text-muted">

                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d M Y') }}

                                    <span class="mx-1">•</span>

                                    <span class="
                                        {{ $pengumuman->status == 'Publish'
                                            ? 'text-success'
                                            : 'text-warning'
                                        }}">
                                        {{ $pengumuman->status }}
                                    </span>

                                </p>

                            </div>

                        </li>

                    @empty

                        <li class="text-center py-4">

                            <i class="ti ti-speakerphone fs-7 text-muted"></i>

                            <p class="text-muted mb-0 mt-2">
                                Belum ada pengumuman.
                            </p>

                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>


    {{-- PROFIL SEKOLAH --}}
    <div class="col-lg-5 d-flex align-items-stretch">

        <div class="card w-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center mb-4">

                    <span class="round-45 bg-light-primary rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="ti ti-building-bank text-primary fs-5"></i>
                    </span>

                    <div>

                        <h5 class="fw-semibold mb-0">
                            {{ $profile->nama_sekolah ?? 'SMK YPC Tasikmalaya' }}
                        </h5>

                        <p class="mb-0 fs-2 text-muted">
                            Profil Sekolah
                        </p>

                    </div>

                </div>


                <div class="mb-3">

                    <p class="mb-1 fs-2 text-muted">
                        Kepala Sekolah
                    </p>

                    <p class="mb-0 fw-semibold fs-3">
                        {{ $profile->kepala_Sekolah ?? '-' }}
                    </p>

                </div>


                <div class="mb-3">

                    <p class="mb-1 fs-2 text-muted">
                        NPSN
                    </p>

                    <p class="mb-0 fw-semibold fs-3">
                        {{ $profile->npsn ?? '-' }}
                    </p>

                </div>


                <div class="mb-3">

                    <p class="mb-1 fs-2 text-muted">
                        Tahun Berdiri
                    </p>

                    <p class="mb-0 fw-semibold fs-3">
                        {{ $profile->tahun_berdiri ?? '-' }}
                    </p>

                </div>


                <a href="{{ route('admin.profile.index') }}"
                   class="btn btn-light-primary text-primary w-100 mt-2">
                    Lihat Profil Sekolah
                </a>

            </div>

        </div>

    </div>

</div>
</div>


@endsection

@extends('layouts.landing-template')
@section('content')

{{-- Hero Section --}}
    <section class="hero">
        <div class="container p-5">

            <div class="row align-items-center">
                <div class="col-lg-7">

                    <span class="btn btn-outline-primary rounded-pill px-5 mb-4 text-white">
                        Sekolah Unggul & Berprestasi
                    </span>

                    <h1 class="hero-title">
                        Mewujudkan Generasi
                        <span class="text-warning">Berprestasi</span>,
                        Berkarakter, &
                        Berperikemanusiaan
                    </h1>

                    <p class="hero-text mt-4">
                        {{ $profile->deskripsi ?? 'SMA Airlangga berkomitmen memberikan pendidikan berkualitas untuk membentuk generasi yang unggul, berkarakter, dan berprestasi.' }}
                    </p>

                </div>
            </div>
        </div>
    </section>


    {{-- CARD KECIL --}}
    <div class="card-kecil mb-5" data-aos="fade-up">
        <div class="container">

                <div class="row justify-content-between">

                    <div class="col-md-3 card-kecil-item">
                        <div class="card-kecil-number">
                            {{ $jumlahSiswa }}
                        </div>
                        <div class="card-kecil-text">
                            SISWA AKTIF
                        </div>
                    </div>

                    <div class="col-md-3 card-kecil-item">
                        <div class="card-kecil-number">
                            {{ $jumlahGuru }}+
                        </div>
                        <div class="card-kecil-text">
                            GURU & STAF AHLI
                        </div>
                    </div>

                    <div class="col-md-3 card-kecil-item">
                        <div class="card-kecil-number">
                            {{ $jumlahPrestasi }}+
                        </div>
                        <div class="card-kecil-text">
                            PRESTASI
                        </div>
                    </div>

                </div>

        </div>
    </div>

    {{-- Profile --}}
    <section class="sambutan" >
        <div class="container p-5" data-aos="fade-right">
            <div class="row align-items-center">

                <div class="col-md-5" ">
                    <div class="sambutan-image">
                        <img src="{{ $profile && $profile->foto ? asset('storage/' .$profile->foto) : asset('assets/images/landing/kepsek.png') }}"
                                alt="Kepala Sekolah">

                        <span class="sambutan-badge">
                            Kepala Sekolah
                        </span>
                    </div>
                </div>

                <div class="col-md-7">
                    <span class="sambutan-label">
                        SAMBUTAN KEPALA SEKOLAH
                    </span>

                    <h2 class="sambutan-title">
                        "Membimbing dengan Hati,<br>
                        Menginspirasi dengan Prestasi"
                    </h2>

                    <p class="sambutan-text">
                        Selamat datang di portal resmi SMA Airlangga.
                        Kami percaya bahwa setiap anak memiliki potensi unik
                        yang patut dikembangkan. Melalui perpaduan kurikulum
                        yang berkualitas, sains modern, dan penanaman nilai
                        karakter, kami berkomitmen mencetak generasi yang
                        berdaya saing.
                    </p>

                    <p class="sambutan-text">
                        Terima kasih atas kepercayaan seluruh orang tua dan
                        masyarakat. Mari bersama-sama wujudkan ekosistem
                        pendidikan yang menyenangkan dan produktif!
                    </p>

                    <hr>

                    <h5 class="sambutan-name">
                        {{ $profile ? $profile->kepala_Sekolah : 'Ajeng Lelantika' }}
                    </h5>

                    <p class="sambutan-job">
                        Kepala SMA Airlangga
                    </p>
                </div>

            </div>
        </div>
        </section>


    {{-- berita --}}

    <div class="berita mt-5">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-8 p-3" data-aos="fade-up">
                    <p class="text-primary mb-0">INFORMASI TERKINI</p>
                    <div class="justify-content-between d-flex">
                        <h4 class="mt-0 fw-bold">Berita Sekolah</h4>
                        <a href="{{ route('landing.berita.index') }}" class="text-primary">Lihat Semua -></a>
                    </div>
                        <div class="row mt-4">
                        @foreach ($beritas as $berita)
                            <div class="col-md-6">
                            <a href="{{ route('landing.berita.detail', $berita->slug) }}" class="d-flex align-items-center text-decoration-none">
                                <div class="card card-berita">
                                    <img src="{{ asset('storage/' .$berita->gambar) }}" class="card-image" alt="{{ $berita->judul }}" srcset="">
                                    <div class="card-body p-3">
                                        <h6 class="card-title"> {{ $berita->judul }}</h6>
                                        <p class="card-text"> {{ Str::limit($berita->isi, 100) }}</p>
                                    </div>
                                </div>
                            </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4 p-4">
                    <div class="card bg-dark p-3" data-aos="fade-left">

                        <div class="d-flex align-items-center">
                        <h5 class="mt-0 fw-bold text-warning me-4">
                            Pengumuman Terbaru
                        </h5>
                        <a href="{{ route('landing.pengumuman.index') }}" class="text-warning text-pengumuman fw-semibold">Lihat Semua -></a>
                        </div>
                        <hr class="text-secondary">

                        @foreach ($pengumumans as $pengumuman)

                            <div class="pengumuman-item mb-3">

                                <div class="pengumuman-date text-secondary">
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d.m.Y') }}
                                </div>

                                <h6 class="mt-2 pengumuman-judul">
                                    {{ $pengumuman->judul }}
                                </h6>

                            </div>

                            @if (!$loop->last)
                                <hr class="text-secondary">
                            @endif

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- guru --}}
    <div class="guru mt-5" data-aos="fade-up">
        <div class="container p-5">

            <div class="text-center">
                <h6 class="text-primary">TENAGA PENDIDIK TERBAIK</h6>
                <h3 class="fw-bold">Guru & Staf Pengajar</h3>
                <p class="card-text text-secondary">
                    Didukung oleh pendidik profesional berdedikasi tinggi dan berpengalaman di bidangnya.
                </p>
            </div>

            <div class="swiper guruSwiper py-5">
                <div class="swiper-wrapper">

                    @foreach ($gurus as $guru)
                        <div class="swiper-slide">
                            <div class="card guru-card h-100">
                                <div class="guru-image">
                                    <img
                                        src="{{ $guru->foto ? asset('storage/' . $guru->foto) : '' }}"
                                        alt="{{ $guru->nama_guru }}"
                                    >
                                </div>

                                <div class="card-body text-center">
                                    <div class="card-title">
                                        <h6>{{ $guru->nama_guru }}</h6>
                                    </div>

                                    <div class="card-text">
                                        {{ $guru->mapel }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>
    </div>

    {{-- prestasi --}}
        <div class="container p-5" data-aos="fade-up">

            <div class="text-center p-5">
                <h6 class="text-warning mb-0-auto">Kebanggaan Sekolah</h6>
                <h3 class="fw-bold text-dark mt-0-auto">Prestasi Siswa & Sekolah</h3>
                <p class="card-text text-secondary">
                    Bukti nyata komitmen kami dalam membimbing talenta unggul di bidang akademik maupun non-akademik.
                </p>
            </div>

            <div class="swiper prestasiSwiper py-5">
                <div class="swiper-wrapper">

                    @foreach ($prestasis as $prestasi)
                        <div class="swiper-slide">
                            <div class="card card-prestasi">
                                <img
                                    src="{{ asset('storage/' . $prestasi->foto) }}"
                                    class="card-image text-white"
                                    alt="{{ $prestasi->nama_prestasi }}"
                                >

                                <div class="card-body">
                                    <h6 class="card-prestasi-title">
                                        {{ $prestasi->nama_prestasi }}
                                    </h6>

                                    <p class="card-text">
                                        {{ $prestasi->deskripsi }}
                                    </p>

                                    <div class="pengumuman-date text-secondary">
                                        {{ $prestasi->tahun_ajaran }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>

    {{-- ESKUL --}}
    <div class="ekstrakulikuler" data-aos="fade-right">
        <div class="container p-5">

            <div class="text-center p-5">
                <h6 class="text-primary">PENGEMBANGAN DIRI</h6>
                <h3 class="fw-bold">Ekstrakurikuler & Wadah Bakat</h3>
                <p class="card-text text-secondary">
                    Berbagai pilihan kegiatan penunjang minat, bakat, kepemimpinan, dan kesehatan siswa.
                </p>
            </div>

            <div class="swiper eskulSwiper py-5">
                <div class="swiper-wrapper">

                    @foreach ($ekskul as $eskul)
                        <div class="swiper-slide">
                            <div class="card card-eskul border-0 h-90">
                                <div class="card-body d-flex align-items-center gap-4">
                                    <img
                                        src="{{ asset('storage/' . $eskul->gambar) }}"
                                        class="eskul-image"
                                        alt="{{ $eskul->nama_eskul }}"
                                    >

                                    <div class="mt-2">
                                        <h5 class="mb-2 fw-bold">
                                            {{ $eskul->nama_eskul }}
                                        </h5>

                                        <p class="mb-0 text-muted">
                                            {{ $eskul->deskripsi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>

    {{-- galeri --}}
    <div class="container p-5" data-aos="fade-up">

        <div class="text-center p-5 mt-5">
            <h6 class="text-primary">DOKUMENTASI</h6>
            <h3 class="fw-bold mt-0-auto">Galeri Kegiatan Sekolah</h3>
            <p class="card-text text-secondary">
                Momen-momen berharga dalam berbagai kegiatan belajar mengajar dan ekstrakurikuler.
            </p>
        </div>

        <div class="swiper galeriSwiper py-5">
            <div class="swiper-wrapper">

                @foreach ($galeris as $galeri)
                    <div class="swiper-slide">
                        <div class="card galeri-card border-0">

                            @if ($galeri->kategori == 'Foto')
                                <img
                                    src="{{ asset('storage/' . $galeri->file) }}"
                                    class="card-img-top"
                                    alt="{{ $galeri->judul }}"
                                >
                            @elseif ($galeri->kategori == 'Video')
                                <video controls class="w-100">
                                    <source
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                        type="video/mp4"
                                    >
                                </video>
                            @endif

                            <div class="galeri-overlay">
                                <div>
                                    <span class="galeri-judul">
                                        {{ $galeri->judul }}
                                    </span>

                                    <h5 class="galeri-keterangan">
                                        {{ $galeri->keterangan }}
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>


@endsection

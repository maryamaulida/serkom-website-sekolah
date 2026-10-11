@extends('layouts.landing-template')
@section('content')

<div class="hero-profile p-5">
    <div class="container p-5">

        {{-- Badge --}}
        <div class="d-flex flex-wrap gap-2 mb-4">

            <span class="badge rounded-pill bg-primary bg-opacity-10 border border-primary text-primary px-3 py-2">
                <i class="fa-solid fa-id-card me-2"></i>
                NPSN:
                <strong class="text-white">{{ $profile->npsn }}</strong>
            </span>

            <span class="badge rounded-pill bg-warning bg-opacity-10 border border-warning text-warning px-3 py-2">
                <i class="fa-solid fa-calendar me-2"></i>
                Tahun Berdiri:
                <strong class="text-white">{{ $profile->tahun_berdiri }}</strong>
            </span>

        </div>

        {{-- Judul --}}
        <div class="mt-3">

            <h2 class="text-warning fw-bold mb-2">
                PROFILE {{ strtoupper($profile->nama_sekolah) }}
            </h2>

            <h2 class="text-white fw-bold mb-3">
                Mewujudkan Generasi Unggul, Berkarakter, & Berprestasi
            </h2>

            <p class="text-white-50 mb-0"
                style="max-width: 700px;">
                Mengenal lebih dekat {{ $profile->nama_sekolah }}
                sebagai sekolah yang berkomitmen mewujudkan generasi
                unggul, berkarakter, dan berprestasi.
            </p>

        </div>
    </div>
</div>

<div class="profile-submenu p-5">
    {{-- sambutan --}}
    <div class="container rounded-4 border p-5 mb-5 bg-white">
         <div class="row align-items-center px-3 g-4">
                {{-- Foto Kepala Sekolah --}}
                <div class="col-12 col-lg-4 text-center">

                    <img src="{{ asset('storage/' . $profile->foto) }}"
                        alt="Foto Kepala Sekolah"
                        class="img-fluid rounded-4 shadow-sm"
                        style="width: 230px; height: 290px; object-fit: cover;">

                    <div class="mt-3">
                        <h5 class="fw-bold mb-1">
                            {{ $profile->kepala_Sekolah }}
                        </h5>

                        <p class="text-warning fw-semibold mb-0">
                            Kepala Sekolah {{ $profile->nama_sekolah }}
                        </p>
                    </div>

                </div>


                {{-- Isi Sambutan --}}
                <div class="col-12 col-lg-8">
                    <div class="border-start border-secondary border-1 ps-4">
                        <small class="text-warning fw-bold">
                            SAMBUTAN KEPALA SEKOLAH
                        </small>

                        <h2 class="fw-bold mt-2 mb-4">
                            Mewujudkan Generasi Unggul,
                            Berkarakter, dan Berprestasi
                        </h2>

                        <small class="text-secondary">
                            Assalamu’alaikum Warahmatullahi Wabarakatuh,
                        </small> <br>

                        <small class="text-secondary">
                            Selamat datang di halaman resmi
                            <strong>{{ $profile->nama_sekolah }}</strong>.
                            Kami berkomitmen untuk memberikan pendidikan
                            yang berkualitas serta menciptakan lingkungan
                            belajar yang nyaman dan mendukung perkembangan
                            setiap peserta didik.
                        </small>

                        <small class="text-secondary p-sambutan-submenu">
                            Melalui proses pembelajaran, kegiatan
                            pengembangan diri, serta berbagai kegiatan
                            sekolah, kami berupaya membentuk generasi yang
                            unggul, berkarakter, mandiri, dan berprestasi.
                        </small> <br>

                        <small class="text-secondary mb-0 p-sambutan-submenu">
                            Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                        </small>

                    </div>
                </div>

            </div>
    </div>

    <div class="container rounded-4 border px-4 py-5 mb-5 bg-dark text-white">

        <h6 class="d-flex align-items-center text-warning">
            <i class="fa-solid fa-school me-2"></i>
            Tentang sekolah
        </h6>

        <h3 class="fw-semibold">
        Profil & Gambaran Umum
        </h3>

        <small class="text-secondary">
            {{ $profile->deskripsi }}
        </small>


    </div>

    <div class="container">
        <div class="text-center mt-3">
        <h3 class="fw-bold">VISI & MISI SEKOLAH</h3>
        <small class="text-secondary visi-text">Arah kompas dan fondasi utama dalam menyelenggarakan pendidikan di SMAN 1 Cendekia</small>
        </div>

        {{-- visi --}}
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="border visi h-100 rounded-4 px-4 py-4">
                    <div class="d-inline-block p-2 border rounded-4 border-warning bg-warning bg-opacity-10 mb-2">
                    <i class="fa-solid fa-eye text-warning "></i>
                    </div> <br>
                    <small class="text-warning fw-semibold mb-2">ARAH MASA DEPAN</small>
                    <h4 class="fw-bold text-white">Visi Utama</h4>

                    <div class="card bg-primary bg-opacity-10 p-2 mt-3 mb-5">
                        <small class="text-white fst-italic visi-text">
                            "{{ $profile->visi }}"
                        </small>
                    </div>

                    <hr class="text-dark mt-4">
                </div>
            </div>

            <div class="col-md-8">
                <div class="border bg-white h-100 rounded-4 px-4 py-4">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-3 bg-primary bg-opacity-10 border border-primary text-primary px-2 py-2 me-2">
                            <i class="fa-solid fa-list-check text-primary"></i>
                        </div>
                        <div>
                            <small class="text-primary">LANGKAH STRATEGIS</small> <br>
                            <h6 class="fw-bold">MISI SEKOLAH</h6>
                        </div>
                    </div>
                    <div class="bg-misi fst-italic p-3 mt-2 rounded-4">
                        <small class="visi-text">{!! nl2br(e($profile->misi)) !!}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5 rounded-4 border px-4 py-4 mb-5 bg-white text-dark">
    <div class="d-flex align-items-center mb-0">
    <h5>
        <i class="fa-solid fa-location-dot text-danger me-2"></i>
    </h5>
        <h5 class="fw-bold">Alamat {{ $profile->nama_sekolah }}</h5>
    </div>
    <h6 class="text-secondary visi-text">Aksesibilitas dan tempat kegiatan belajar mengajar {{ $profile->nama_sekolah }}</h6>

    <div class="bg-alamat mt-4 px-4 py-3">
        <div class="text-secondary alamat-text fw-semibold mb-2">
            ALAMAT LENGKAP
        </div>
            <small class="fw-semibold">{{ $profile->alamat }}</small>
    </div>
</div>


</div>



@endsection

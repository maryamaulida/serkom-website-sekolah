@extends('layouts.landing-template')

@section('content')




<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 mb-4">

            <div class="row align-items-center">

                {{-- JUDUL --}}
                <div class="col-lg-8">

                    <h2 class="fw-bold text-dark mb-2">
                        <i class="fa-solid fa-trophy text-primary me-2 fs-3"></i>
                        Prestasi Sekolah
                    </h2>

                    <p class="text-secondary mb-0">
                        Rekam jejak pencapaian kejuaraan {{ $profile->nama_sekolah }}
                    </p>

                </div>


            </div>

        </div>


        {{-- DAFTAR BERITA --}}
        @if($prestasis->count() > 0)

            <div class="row g-4">

                @foreach($prestasis as $prestasi)

                    <div class="col-lg-4 col-md-6">

                        <div class="card berita-card h-100 shadow-sm bg-white">

                            {{-- FOTO --}}
                            <div class="berita-image-wrapper">

                                @if($prestasi->foto)

                                    <img
                                        src="{{ asset('storage/' . $prestasi->foto) }}"
                                        alt="{{ $prestasi->nama_prestasi }}"
                                        class="berita-image"
                                    >

                                @else

                                    <div class="bg-secondary-subtle
                                                d-flex
                                                align-items-center
                                                justify-content-center
                                                h-100">

                                        <i class="fa-regular fa-image fs-1 text-secondary"></i>

                                    </div>

                                @endif

                            </div>


                            {{-- ISI CARD --}}
                            <div class="card-body p-4 d-flex flex-column">

                                {{-- TANGGAL --}}
                                <div class="text-secondary small mb-2">

                                    <i class="fa-solid fa-calendar text-primary"></i>
                                        <small>Tahun ajaran :</small>
                                    {{ $prestasi->tahun_ajaran }}

                                </div>


                                {{-- JUDUL --}}
                                <h5 class="fw-bold text-dark mb-2">

                                    {{ $prestasi->nama_prestasi }}

                                </h5>


                                {{-- DESKRIPSI --}}
                                <p class="text-secondary small berita-deskripsi mb-4">

                                    {{ Str::limit(strip_tags($prestasi->deskripsi), 120) }}

                                </p>


                                {{-- DETAIL --}}
                                <a href="{{ route('landing.prestasi.detail', $prestasi->id_prestasi) }}"
                                   class="text-primary text-decoration-none fw-semibold mt-auto">

                                    Baca Selengkapnya

                                    <i class="fa-solid fa-chevron-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- KALAU BELUM ADA BERITA --}}
            <div class="bg-white border rounded-4 shadow-sm text-center py-5">

                <i class="fa-regular fa-newspaper fs-1 text-secondary mb-3"></i>

                <h5 class="fw-bold">
                    Belum Ada Prestasi
                </h5>

                <p class="text-secondary mb-0">
                    Belum ada prestasi sekolah yang tersedia.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

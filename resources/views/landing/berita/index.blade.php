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
                        <i class="fa-solid fa-newspaper text-primary me-2 fs-3"></i>
                        Berita & Kabar Sekolah
                    </h2>

                    <p class="text-secondary mb-0">
                        Informasi kegiatan dan kabar berita terkini
                        seputar {{ $profile->nama_sekolah }}
                    </p>

                </div>


            </div>

        </div>


        {{-- DAFTAR BERITA --}}
        @if($beritas->count() > 0)

            <div class="row g-4">

                @foreach($beritas as $berita)

                    <div class="col-lg-4 col-md-6">

                        <div class="card berita-card h-100 shadow-sm bg-white">

                            {{-- FOTO --}}
                            <div class="berita-image-wrapper">

                                @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}"
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

                                    <i class="fa-regular fa-calendar me-2"></i>

                                    {{ $berita->created_at->format('d F Y') }}

                                </div>


                                {{-- JUDUL --}}
                                <h5 class="fw-bold text-dark mb-2">

                                    {{ $berita->judul }}

                                </h5>


                                {{-- DESKRIPSI --}}
                                <p class="text-secondary small berita-deskripsi mb-4">

                                    {{ Str::limit(strip_tags($berita->isi), 120) }}

                                </p>


                                {{-- DETAIL --}}
                                <a href="{{ route('landing.berita.detail', $berita->slug) }}"
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
                    Belum Ada Berita
                </h5>

                <p class="text-secondary mb-0">
                    Belum ada berita sekolah yang tersedia.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

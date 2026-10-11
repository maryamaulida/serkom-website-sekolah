@extends('layouts.landing-template')

@section('content')

<style>
    .guru-card {
        border: 1px solid #e5e9ef;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .guru-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
    }

    .guru-image-wrapper {
        height: 230px;
        overflow: hidden;
        margin: 22px 22px 0;
        border-radius: 15px;
        position: relative;
    }

    .guru-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .guru-card:hover .guru-image {
        transform: scale(1.04);
    }

    .guru-title {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .guru-pendidikan {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>


<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 mb-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h2 class="fw-bold text-dark mb-2">

                        <i class="fa-solid fa-chalkboard-user text-primary me-2 fs-3"></i>

                        Daftar Tenaga Pendidik & Guru

                    </h2>

                    <p class="text-secondary mb-0">

                        Daftar lengkap tenaga pendidik dan guru
                        {{ $profile->nama_sekolah }}

                    </p>

                </div>

            </div>

        </div>


        {{-- DAFTAR GURU --}}
        @if($gurus->count() > 0)

            <div class="row g-4">

                @foreach($gurus as $guru)

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="card guru-card h-100 shadow-sm bg-white">

                            {{-- FOTO GURU --}}
                            <div class="guru-image-wrapper">

                                @if($guru->foto)

                                    <img
                                        src="{{ asset('storage/' . $guru->foto) }}"
                                        alt="{{ $guru->nama_guru }}"
                                        class="guru-image"
                                    >

                                @else

                                    <div class="bg-secondary-subtle
                                                d-flex
                                                align-items-center
                                                justify-content-center
                                                h-100">

                                        <i class="fa-solid fa-user-tie fs-1 text-secondary"></i>

                                    </div>

                                @endif

                            </div>


                            {{-- INFORMASI GURU --}}
                            <div class="card-body p-4 d-flex flex-column">

                                {{-- NAMA --}}
                                <h5 class="fw-bold text-dark mb-2 guru-title">

                                    {{ $guru->nama_guru }}

                                </h5>


                                {{-- NIP --}}
                                <div class="text-secondary small mb-2">

                                    <span class="fw-semibold">NIP:</span>

                                    {{ $guru->nip }}

                                </div>


                                {{-- PENDIDIKAN --}}
                                <div class="text-secondary small guru-pendidikan mb-3">

                                    {{ $guru->mapel ?? 'Pendidikan belum tersedia' }} <br>
                                    {{ $guru->jabatan ?? '-' }}

                                </div>


                                <hr class="mt-auto">


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('landing.guru.detail', $guru->id_guru) }}"
                                    class="text-primary text-decoration-none fw-semibold"
                                >

                                    Lihat Biografi

                                    <i class="fa-solid fa-arrow-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- KALAU BELUM ADA GURU --}}
            <div class="bg-white border rounded-4 shadow-sm text-center py-5">

                <i class="fa-solid fa-chalkboard-user fs-1 text-secondary mb-3"></i>

                <h5 class="fw-bold">
                    Belum Ada Data Guru
                </h5>

                <p class="text-secondary mb-0">
                    Data tenaga pendidik belum tersedia.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

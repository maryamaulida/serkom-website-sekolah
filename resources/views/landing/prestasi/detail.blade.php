@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- CARD DETAIL --}}
        <div class="bg-white border rounded-4 shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="border-bottom p-4 p-md-5">

                <div class="d-flex flex-wrap align-items-center gap-3">

                    {{-- BADGE --}}
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                        <i class="fa-solid fa-trophy me-2"></i>
                        Prestasi Sekolah
                    </span>

                    {{-- TAHUN --}}
                    <span class="text-secondary fw-semibold">
                        <i class="fa-regular fa-calendar me-2"></i>
                        {{ $prestasi->tahun_ajaran }}
                    </span>

                </div>

            </div>


            {{-- ISI --}}
            <div class="p-4 p-md-5">

                <div class="row g-4 g-lg-5 align-items-start">

                    {{-- FOTO --}}
                    <div class="col-lg-5">

                        @if($prestasi->foto)

                            <img
                                src="{{ asset('storage/' . $prestasi->foto) }}"
                                alt="{{ $prestasi->nama_prestasi }}"
                                class="img-fluid w-100 rounded-4 shadow-sm"
                                style="height: 350px; object-fit: cover;"
                            >

                        @else

                            <div
                                class="bg-secondary-subtle rounded-4 d-flex align-items-center justify-content-center"
                                style="height: 350px;"
                            >

                                <i class="fa-regular fa-image fs-1 text-secondary"></i>

                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
                    <div class="col-lg-7">

                        {{-- JUDUL --}}
                        <h1 class="fw-bold text-dark mb-3">

                            {{ $prestasi->nama_prestasi }}

                        </h1>


                        {{-- TAHUN --}}
                        <div class="text-secondary mb-4">

                            <i class="fa-solid fa-calendar text-primary me-2"></i>

                            Tahun Ajaran:
                            <span class="fw-semibold text-dark">
                                {{ $prestasi->tahun_ajaran }}
                            </span>

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="bg-light border rounded-4 p-4">

                            <h5 class="fw-bold text-dark mb-3">

                                <i class="fa-solid fa-award text-primary me-2"></i>

                                Deskripsi Prestasi

                            </h5>

                            <p class="text-secondary mb-0 lh-lg">

                                {{ $prestasi->deskripsi }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="bg-light border-top p-4 p-md-5">

                <a
                    href="{{ route('landing.prestasi.index') }}"
                    class="btn btn-dark rounded-4 px-4 py-3 fw-semibold"
                >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Kembali ke Prestasi

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

@extends('layouts.landing-template')

@section('content')

<style>
    .guru-detail {
        border-radius: 24px;
        overflow: hidden;
    }

    .guru-detail-header {
        border-bottom: 1px solid #e9edf3;
    }

    .guru-detail-foto {
        width: 175px;
        height: 215px;
        object-fit: cover;
        border-radius: 20px;
    }

    .guru-detail-info {
        background-color: #f8fafc;
        border: 1px solid #e9edf3;
        border-radius: 18px;
    }

    .guru-label {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 4px;
    }

    .guru-value {
        font-weight: 600;
        color: #172033;
    }
</style>


<div class="bg-light py-4 py-md-5">

    <div class="container">

        <div class="bg-white shadow-sm guru-detail">

            {{-- HEADER --}}
            <div class="guru-detail-header p-4 p-md-5">

                <div class="d-flex align-items-center gap-3">

                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 fs-6">
                        Profil Guru
                    </span>

                    <span class="text-secondary fw-semibold">
                        NIP: {{ $guru->nip ?? '-' }}
                    </span>

                </div>

            </div>


            {{-- ISI --}}
            <div class="p-4 p-md-5">

                <div class="row align-items-center g-4">

                    {{-- FOTO --}}
                    <div class="col-md-3 text-center text-md-start">

                        @if($guru->foto)

                            <img
                                src="{{ asset('storage/' . $guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                class="guru-detail-foto"
                            >

                        @else

                            <div
                                class="guru-detail-foto bg-secondary-subtle
                                       d-flex align-items-center
                                       justify-content-center"
                            >

                                <i class="fa-solid fa-user fs-1 text-secondary"></i>

                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
                    <div class="col-md-9">

                        {{-- NAMA --}}
                        <h2 class="fw-bold text-dark mb-2">

                            {{ $guru->nama_guru }}

                        </h2>


                        {{-- MAPEL --}}
                        <div class="text-primary fw-semibold fs-5 mb-4">

                            <i class="fa-solid fa-book-open me-2"></i>

                            Guru {{ $guru->mapel ?? '-' }}

                        </div>


                        {{-- DETAIL --}}
                        <div class="guru-detail-info p-4">

                            <div class="row g-4">

                                {{-- NIP --}}
                                <div class="col-md-6">

                                    <div class="guru-label">
                                        NIP
                                    </div>

                                    <div class="guru-value">
                                        {{ $guru->nip ?? '-' }}
                                    </div>

                                </div>


                                {{-- JABATAN --}}
                                <div class="col-md-6">

                                    <div class="guru-label">
                                        Jabatan
                                    </div>

                                    <div class="guru-value">
                                        {{ $guru->jabatan ?? '-' }}
                                    </div>

                                </div>


                                {{-- MATA PELAJARAN --}}
                                <div class="col-12">

                                    <div class="guru-label">
                                        Mata Pelajaran
                                    </div>

                                    <div class="guru-value">
                                        {{ $guru->mapel ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="bg-light p-4 p-md-5 text-end">

                <a
                    href="{{ route('landing.guru.index') }}"
                    class="btn btn-dark rounded-4 px-4 py-3 fw-semibold"
                >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Kembali ke Daftar Guru

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

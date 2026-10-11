@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- TOMBOL KEMBALI --}}
        <div class="mb-4">

            <a href="{{ route('landing.pengumuman.index') }}"
               class="text-decoration-none text-secondary d-inline-flex align-items-center">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Kembali ke Pengumuman

            </a>

        </div>


        {{-- HEADER --}}
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 mb-4">

            <div class="row align-items-center">

                {{-- JUDUL --}}
                <div class="col-lg-8">

                    <h2 class="fw-bold text-dark mb-2">

                        <i class="fa-solid fa-bullhorn text-warning me-2 fs-2"></i>

                        Detail Pengumuman & Edaran Resmi

                    </h2>

                    <p class="text-secondary mb-0">

                        Detail informasi dan pemberitahuan penting bagi siswa & wali murid
                        {{ $profile->nama_sekolah }}

                    </p>

                </div>

            </div>

        </div>


        {{-- DETAIL PENGUMUMAN --}}
        <div class="bg-white border rounded-4 shadow-sm overflow-hidden">

            {{-- ISI DETAIL --}}
            <div class="p-4 p-md-5">

                {{-- TANGGAL --}}
                <div class="d-flex align-items-center text-secondary mb-3">

                    <i class="fa-regular fa-calendar me-2"></i>

                    <small>
                        {{ $pengumuman->tanggal }}
                    </small>

                </div>


                {{-- JUDUL --}}
                <h3 class="fw-bold text-dark mb-4">

                    {{ $pengumuman->judul }}

                </h3>


                {{-- GARIS --}}
                <hr class="mb-4">


                {{-- ISI --}}
                <div class="detail-pengumuman text-secondary">

                    {!! nl2br(e($pengumuman->isi)) !!}

                </div>

            </div>


            {{-- TUTUP DETAIL --}}
            <div class="bg-light border-top p-4 d-flex justify-content-end">

                <a href="{{ route('landing.pengumuman.index') }}"
                   class="btn btn-dark rounded-4 px-4 py-3 fw-bold">

                    Tutup Detail

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

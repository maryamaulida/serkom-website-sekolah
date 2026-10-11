@extends('layouts.landing-template')
@section('content')
    <div class="bg-light py-4 py-md-5">
        <div class="container">
            <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 mb-4">

                <div class="row align-items-center">

                    {{-- JUDUL --}}
                    <div class="col-lg-8">

                        <h2 class="fw-bold text-dark mb-2">
                            <i class="fa-solid fa-bullhorn text-warning me-2 fs-2"></i>
                            Pengumuman & Edaran Resmi
                        </h2>

                        <p class="text-secondary mb-0">
                            Informasi dan pemberitahuan penting bagi siswa & wali murid {{ $profile->nama_sekolah }}
                        </p>

                    </div>


                </div>

            </div>

            @if($pengumumans->count() >0)
            @foreach ($pengumumans as $pengumuman)
            <a href="{{ route('landing.pengumuman.detail', $pengumuman->id_pengumuman) }}">
            <div class="bg-white border card-pengumuman rounded-4 shadow-sm px-4 py-4 mb-4">
                <div class="row g-2 align-items-center d-flex">
                    <div class="col-md-11">
                        <div class="d-flex align-items-center small text-secondary mb-2">
                            <i class="fa-regular fa-calendar text-secondary me-2 fs-6"></i>
                                {{ $pengumuman->tanggal }}
                        </div>

                        <div class="text-dark mb-2 fs-5 fw-bold judul-pengumuman">
                            {{ $pengumuman->judul }}
                        </div>

                        <small class="text-secondary d-block isi-pengumuman">
                            {{ $pengumuman->isi }}
                        </small>
                    </div>
                    <div class="col-md-1">
                        <span class="btn bg-light rounded-4 d-flex align-items-center">
                            <small class="fw-bold">Detail</small>
                            <i class="fa-solid fa-arrow-right small ms-2"></i>
                        </span>
                    </div>
                </div>

            </div>
            </a>
            @endforeach
            @endif

        </div>
    </div>
@endsection

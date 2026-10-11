@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        <div class="bg-white rounded-4 shadow-sm overflow-hidden">

            {{-- Header --}}
            <div class="border-bottom px-4 px-md-5 py-4">

                <div class="d-flex flex-wrap align-items-center gap-3">

                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                        Berita - Kegiatan
                    </span>

                    <span class="text-secondary fw-semibold">
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                    </span>

                </div>

            </div>


            {{-- Isi Detail --}}
            <div class="px-4 px-md-5 py-4">

                {{-- Gambar --}}
                <div class="berita-detail-image mb-4">

                    @if($berita->gambar)

                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            class="w-100 h-100 object-fit-cover"
                        >

                    @else

                        <div class="bg-light d-flex align-items-center justify-content-center h-100">
                            <i class="fa-regular fa-image fs-1 text-secondary"></i>
                        </div>

                    @endif

                </div>


                {{-- Penulis --}}
                <div class="text-secondary mb-2">

                    <i class="fa-solid fa-user-pen me-2"></i>

                        Berita dibuat oleh {{ $berita->user->name }}

                </div>


                {{-- Judul --}}
                <h1 class="fw-bold text-dark mb-4">

                    {{ $berita->judul }}

                </h1>


                <hr class="mb-4">


                {{-- Isi Berita --}}
                <div class="berita-detail-content text-dark">

                    {!! nl2br(e($berita->isi)) !!}

                </div>

            </div>


            {{-- Footer --}}
            <div class="bg-light px-4 px-md-5 py-4">

                <a
                    href="{{ route('landing.berita.index') }}"
                    class="btn btn-dark rounded-4 px-4 py-3 fw-semibold"
                >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Kembali ke Berita

                </a>

            </div>

        </div>

    </div>

</div>


<style>

    .berita-detail-image {
        width: 100%;
        height: 400px;
        overflow: hidden;
        border-radius: 20px;
    }

    .berita-detail-content {
        font-size: 17px;
        line-height: 1.8;
    }

</style>

@endsection

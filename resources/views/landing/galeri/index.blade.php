
@extends('layouts.landing-template')

@section('content')

<style>
    .galeri-card {
        height: 280px;
        border-radius: 18px;
        overflow: hidden;
        position: relative;
        border: none;
        background-color: #e9ecef;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .galeri-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12) !important;
    }

    .galeri-image,
    .galeri-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .galeri-image {
        transition: transform 0.4s ease;
    }

    .galeri-card:hover .galeri-image {
        transform: scale(1.04);
    }

    .galeri-video {
        position: relative;
        z-index: 1;
        background-color: #000;
    }

    .galeri-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e9ecef;
    }

    .galeri-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        background: linear-gradient(
            to top,
            rgba(15, 23, 42, 0.85),
            rgba(15, 23, 42, 0.05) 65%
        );
        pointer-events: none;
        z-index: 2;
    }

    .galeri-badge {
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 3;
    }

    .galeri-judul {
        color: white;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .galeri-keterangan {
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
        margin-bottom: 0;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .galeri-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }

    .galeri-link:focus-visible {
        outline: 3px solid #0d6efd;
        outline-offset: 3px;
        border-radius: 18px;
    }

    .galeri-video-wrap {
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .galeri-video-wrap .galeri-video {
        position: relative;
        z-index: 1;
    }

    .galeri-video-wrap .galeri-overlay {
        z-index: 2;
    }

    .galeri-video-wrap .galeri-badge {
        z-index: 3;
    }

    @media (max-width: 576px) {
        .galeri-card {
            height: 250px;
        }

        .galeri-overlay {
            padding: 16px;
        }

        .galeri-judul {
            font-size: 18px;
        }
    }
</style>

<div class="bg-light py-4 py-md-5">
    <div class="container">

        {{-- HEADER --}}
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 mb-4">
            <h2 class="fw-bold text-dark mb-2">
                <i class="fa-solid fa-images text-primary me-2 fs-3"></i>
                Galeri Sekolah
            </h2>

            <p class="text-secondary mb-0">
                Dokumentasi kegiatan dan berbagai aktivitas
                {{ $profile->nama_sekolah ?? 'sekolah' }}
            </p>
        </div>

        {{-- GALERI --}}
        @if ($galeris->count() > 0)

            <div class="row g-4">

                @foreach ($galeris as $galeri)

                    <div class="col-lg-4 col-md-6">

                        <div class="card galeri-card shadow-sm">

                            @if ($galeri->kategori == 'Video' && $galeri->file)

                                {{-- VIDEO --}}
                                <div class="galeri-video-wrap">

                                    <video
                                        controls
                                        preload="metadata"
                                        class="galeri-video"
                                        aria-label="{{ $galeri->judul }}"
                                    >
                                        <source
                                            src="{{ asset('storage/' . $galeri->file) }}"
                                            type="video/mp4"
                                        >

                                        Browser kamu tidak mendukung video.
                                    </video>

                                    {{-- BADGE VIDEO --}}
                                    <span class="badge bg-dark bg-opacity-75 rounded-3 px-3 py-2 galeri-badge">
                                        <i class="fa-solid fa-circle-play text-danger me-1"></i>
                                        Video
                                    </span>

                                    {{-- OVERLAY VIDEO --}}
                                    <div class="galeri-overlay">
                                        <h5 class="galeri-judul">
                                            {{ $galeri->judul }}
                                        </h5>

                                        <p class="galeri-keterangan">
                                            {{ $galeri->keterangan }}
                                        </p>
                                    </div>

                                </div>

                            @elseif ($galeri->file)

                                {{-- FOTO --}}
                                <a
                                    href="{{ route('landing.galeri.detail', $galeri->id_galeri) }}"
                                    class="galeri-link h-100"
                                >
                                    <img
                                        src="{{ asset('storage/' . $galeri->file) }}"
                                        alt="{{ $galeri->judul }}"
                                        class="galeri-image"
                                        loading="lazy"
                                    >

                                    {{-- BADGE FOTO --}}
                                    <span class="badge bg-dark bg-opacity-75 rounded-3 px-3 py-2 galeri-badge">
                                        <i class="fa-solid fa-camera text-primary me-1"></i>
                                        Foto
                                    </span>

                                    {{-- OVERLAY FOTO --}}
                                    <div class="galeri-overlay">
                                        <h5 class="galeri-judul">
                                            {{ $galeri->judul }}
                                        </h5>

                                        <p class="galeri-keterangan">
                                            {{ $galeri->keterangan }}
                                        </p>
                                    </div>
                                </a>

                            @else

                                {{-- FILE KOSONG --}}
                                <a
                                    href="{{ route('landing.galeri.detail', $galeri->id_galeri) }}"
                                    class="galeri-link h-100"
                                >
                                    <div class="galeri-placeholder">
                                        <i class="fa-regular fa-image fs-1 text-secondary"></i>
                                    </div>

                                    <span class="badge bg-dark bg-opacity-75 rounded-3 px-3 py-2 galeri-badge">
                                        <i class="fa-regular fa-image me-1"></i>
                                        Media kosong
                                    </span>

                                    <div class="galeri-overlay">
                                        <h5 class="galeri-judul">
                                            {{ $galeri->judul }}
                                        </h5>

                                        <p class="galeri-keterangan">
                                            {{ $galeri->keterangan }}
                                        </p>
                                    </div>
                                </a>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- DATA KOSONG --}}
            <div class="bg-white border rounded-4 shadow-sm text-center py-5">

                <i class="fa-regular fa-images fs-1 text-secondary mb-3"></i>

                <h5 class="fw-bold">
                    Belum Ada Galeri
                </h5>

                <p class="text-secondary mb-0">
                    Belum ada dokumentasi sekolah yang tersedia.
                </p>

            </div>

        @endif

    </div>
</div>

@endsection


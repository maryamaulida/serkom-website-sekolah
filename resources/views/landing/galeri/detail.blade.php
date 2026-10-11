@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        <div class="bg-white border rounded-4 shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="border-bottom p-4 p-md-5">

                <div class="d-flex flex-wrap align-items-center gap-3">

                    {{-- KATEGORI --}}
                    @if($galeri->kategori == 'Video')

                        <span class="badge bg-dark rounded-pill px-3 py-2">

                            <i class="fa-solid fa-circle-play text-danger me-2"></i>

                            Video

                        </span>

                    @else

                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                            <i class="fa-solid fa-camera me-2"></i>

                            Foto

                        </span>

                    @endif


                    {{-- TANGGAL --}}
                    @if($galeri->created_at)

                        <span class="text-secondary fw-semibold">

                            <i class="fa-regular fa-calendar me-2"></i>

                            {{ $galeri->created_at->format('d F Y') }}

                        </span>

                    @endif

                </div>

            </div>


            {{-- ISI --}}
            <div class="p-4 p-md-5">

                {{-- JUDUL --}}
                <h1 class="fw-bold text-dark mb-4">

                    {{ $galeri->judul }}

                </h1>


                {{-- MEDIA --}}
                <div class="mb-4">

                    @if($galeri->file)

                        @if($galeri->kategori == 'Video')

                            <video
                                controls
                                class="w-100 rounded-4 shadow-sm"
                                style="max-height: 550px;"
                            >

                                <source
                                    src="{{ asset('storage/' . $galeri->file) }}"
                                >

                                Browser kamu tidak mendukung video.

                            </video>

                        @else

                            <img
                                src="{{ asset('storage/' . $galeri->file) }}"
                                alt="{{ $galeri->judul }}"
                                class="img-fluid w-100 rounded-4 shadow-sm"
                                style="max-height: 550px; object-fit: cover;"
                            >

                        @endif

                    @else

                        <div
                            class="bg-secondary-subtle rounded-4 d-flex align-items-center justify-content-center"
                            style="height: 400px;"
                        >

                            <i class="fa-regular fa-image fs-1 text-secondary"></i>

                        </div>

                    @endif

                </div>


                {{-- KETERANGAN --}}
                <div class="bg-light border rounded-4 p-4">

                    <h5 class="fw-bold text-dark mb-3">

                        <i class="fa-solid fa-circle-info text-primary me-2"></i>

                        Keterangan

                    </h5>

                    <p class="text-secondary mb-0 lh-lg">

                        {{ $galeri->keterangan ?? 'Tidak ada keterangan.' }}

                    </p>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="bg-light border-top p-4 p-md-5">

                <a
                    href="{{ route('landing.galeri.index') }}"
                    class="btn btn-dark rounded-4 px-4 py-3 fw-semibold"
                >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Kembali ke Galeri

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

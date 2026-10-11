@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- DETAIL EKSKUL --}}
        <div class="bg-white border rounded-4 shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="d-flex align-items-center justify-content-between px-4 px-md-5 py-4 border-bottom">

                <div class="d-flex align-items-center gap-2">

                    <span class="bg-primary-subtle text-primary rounded-pill px-3 py-2 fw-semibold">
                        Ekstrakurikuler
                    </span>

                    <span class="text-secondary fw-semibold">
                        {{ $eskul->nama_eskul }}
                    </span>

                </div>


                <a href="{{ route('landing.eskul.index') }}"
                   class="btn bg-light rounded-circle d-flex align-items-center justify-content-center"
                   style="width: 50px; height: 50px;">

                    <i class="fa-solid fa-xmark fs-5 text-secondary"></i>

                </a>

            </div>


            {{-- ISI --}}
            <div class="p-4 p-md-5">

                {{-- PROFILE EKSKUL --}}
                <div class="bg-light border rounded-4 p-4 mb-4">

                    <div class="d-flex align-items-center">

                        {{-- GAMBAR --}}
                        @if($eskul->gambar)

                            <img
                                src="{{ asset('storage/' . $eskul->gambar) }}"
                                alt="{{ $eskul->nama_eskul }}"
                                width="96"
                                height="96"
                                class="rounded-4 flex-shrink-0"
                                style="object-fit: cover;"
                            >

                        @else

                            <div
                                class="bg-white border rounded-4 d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 96px; height: 96px;"
                            >
                                <i class="fa-solid fa-school text-secondary fs-2"></i>
                            </div>

                        @endif


                        <div class="ms-4">

                            <h2 class="fw-bold text-dark mb-1">
                                {{ $eskul->nama_eskul }}
                            </h2>

                            <p class="text-secondary fs-5 mb-0">

                                Pembina:

                                <span class="fw-semibold text-dark">
                                    {{ $eskul->nama_pembina }}
                                </span>

                            </p>

                        </div>

                    </div>

                </div>


                {{-- JADWAL --}}
                <div class="bg-white border border-primary-subtle rounded-4 p-3 px-4 mb-4">

                    <div class="text-secondary fw-semibold">
                        Jadwal Latihan
                    </div>

                    <div class="fw-bold text-dark fs-5">
                        {{ $eskul->jadwal_latihan }}
                    </div>

                </div>


                {{-- GARIS --}}
                <hr class="my-4">


                {{-- DESKRIPSI --}}
                <div>

                    <h5 class="fw-bold text-dark mb-3">
                        DESKRIPSI & AGENDA KEGIATAN
                    </h5>

                    <p class="text-secondary fs-5 lh-lg mb-0">
                        {{ $eskul->deskripsi }}
                    </p>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="bg-light p-4 d-flex justify-content-end">

                <a href="{{ route('landing.eskul.index') }}"
                   class="btn btn-dark rounded-4 px-4 py-3 fw-bold">

                    Tutup Detail

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

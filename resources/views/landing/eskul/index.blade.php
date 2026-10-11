@extends('layouts.landing-template')

@section('content')

<div class="bg-light py-4 py-md-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <h1 class="fw-bold text-dark mb-2">
                Ekstrakurikuler
            </h1>

            <p class="text-secondary mb-0">
                Kembangkan minat, bakat, dan kemampuan melalui berbagai kegiatan ekstrakurikuler.
            </p>

        </div>


        {{-- DAFTAR EKSKUL --}}
        <div class="row g-4">

            @if($eskuls->count() > 0)

                @foreach($eskuls as $ekskul)

                    <div class="col-lg-4 col-md-6">

                        <div class="card border-0 rounded-4 shadow-sm h-100">

                            <div class="card-body p-4">

                                {{-- FOTO + NAMA --}}
                                <div class="d-flex align-items-center mb-4">

                                    @if($ekskul->gambar)

                                        <img
                                            src="{{ asset('storage/' . $ekskul->gambar) }}"
                                            alt="{{ $ekskul->nama_eskul }}"
                                            width="82"
                                            height="82"
                                            class="rounded-4 flex-shrink-0"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div
                                            class="bg-light border rounded-4 d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width: 82px; height: 82px;"
                                        >
                                            <i class="fa-solid fa-school text-secondary fs-3"></i>
                                        </div>

                                    @endif


                                    <div class="ms-3">

                                        <h5 class="fw-semibold text-dark mb-1">
                                            {{ $ekskul->nama_eskul }}
                                        </h5>

                                        <p class="text-secondary mb-0">
                                            Pembina: {{ $ekskul->nama_pembina }}
                                        </p>

                                    </div>

                                </div>


                                {{-- DESKRIPSI --}}
                                <p class="text-secondary mb-4 deskripsi-eskul">
                                    {{ $ekskul->deskripsi }}
                                </p>


                                {{-- JADWAL --}}
                                <div class="bg-light border rounded-4 p-3 mb-4">

                                    <div class="d-flex align-items-center text-secondary">

                                        <i class="fa-regular fa-clock text-primary me-2"></i>

                                        <span>
                                            {{ $ekskul->jadwal_latihan }}
                                        </span>

                                    </div>

                                </div>


                                {{-- DETAIL --}}
                                <div class="border-top pt-3">

                                    <a
                                        href="{{ route('landing.eskul.detail', ['id' => $ekskul->id_ekskul]) }}"
                                        class="text-primary text-decoration-none fw-semibold d-flex align-items-center justify-content-between"
                                    >

                                        <span>
                                            Detail Kegiatan
                                        </span>

                                        <i class="fa-solid fa-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                {{-- DATA KOSONG --}}
                <div class="col-12">

                    <div class="card border-0 rounded-4 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="fa-solid fa-school fs-1 text-secondary mb-3"></i>

                            <h5 class="fw-bold text-dark">
                                Belum Ada Ekstrakurikuler
                            </h5>

                            <p class="text-secondary mb-0">
                                Data ekstrakurikuler belum tersedia.
                            </p>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection

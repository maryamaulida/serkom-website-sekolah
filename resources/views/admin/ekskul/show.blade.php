@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

        <div>

            <a href="{{ route('admin.ekskul.index') }}"
               class="text-muted text-decoration-none d-inline-flex align-items-center mb-2">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Ekskul

            </a>

            <h4 class="fw-semibold mb-1">
                Detail Ekstrakurikuler
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap ekstrakurikuler
            </p>

        </div>


        {{-- Tombol --}}
        @if(Auth::user()->role === 'Admin')

            <div class="d-flex gap-2">

                <a href="{{ route('admin.ekskul.edit', $ekskul->id_ekskul) }}"
                   class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.ekskul.destroy', $ekskul->id_ekskul) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ekskul ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">

                        <i class="ti ti-trash me-1"></i>
                        Hapus

                    </button>

                </form>

            </div>

        @endif

    </div>


    {{-- Detail --}}
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                {{-- Gambar --}}
                <div class="col-lg-5">

                    @if($ekskul->gambar)

                        <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                             class="img-fluid rounded-3"
                             alt="{{ $ekskul->nama_eskul }}"
                             style="
                                width: 100%;
                                height: 300px;
                                object-fit: cover;
                             ">

                    @else

                        <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                             class="img-fluid rounded-3"
                             alt="Gambar Ekskul"
                             style="
                                width: 100%;
                                height: 300px;
                                object-fit: cover;
                             ">

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-7">

                    {{-- Nama Ekskul --}}
                    <h3 class="fw-semibold mb-4">
                        {{ $ekskul->nama_eskul }}
                    </h3>


                    {{-- Pembina --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 140px;">

                            <i class="ti ti-user me-2"></i>
                            Nama Pembina

                        </div>

                        <div>
                            :
                            {{ $ekskul->nama_pembina }}
                        </div>

                    </div>


                    {{-- Jadwal --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 140px;">

                            <i class="ti ti-calendar me-2"></i>
                            Jadwal Latihan

                        </div>

                        <div>
                            :
                            {{ $ekskul->jadwal_latihan }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- Deskripsi --}}
            <div class="border-top mt-4 pt-4">

                <div class="p-4 rounded-3"
                     style="background-color: #f8f9fa;">

                    <h6 class="fw-semibold mb-3">

                        <i class="ti ti-notes me-2"></i>
                        Deskripsi

                    </h6>

                    <div class="text-secondary"
                         style="
                            line-height: 1.8;
                            white-space: pre-line;
                            text-align: justify;
                         ">

                        {{ $ekskul->deskripsi ?: '-' }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

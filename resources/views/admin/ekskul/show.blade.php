@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <a href="{{ route('admin.ekskul.index') }}"
               class="text-muted text-decoration-none">
                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Data Ekskul
            </a>

            <h4 class="fw-semibold mt-3 mb-1">
                Detail Ekstrakurikuler
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap ekstrakurikuler
            </p>

        </div>


        <a href="{{ route('admin.ekskul.edit', $ekskul->id) }}"
           class="btn btn-primary">
            <i class="ti ti-edit me-1"></i>
            Edit Ekskul
        </a>

    </div>


    {{-- Detail --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Gambar --}}
                <div class="col-lg-5">

                    @if ($ekskul->gambar)

                        <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                             class="img-fluid rounded"
                             alt="{{ $ekskul->nama_eskul }}"
                             style="width: 100%; height: 300px; object-fit: cover;">

                    @else

                        <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                             class="img-fluid rounded"
                             alt="Gambar Ekskul"
                             style="width: 100%; height: 300px; object-fit: cover;">

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-7">

                    <h3 class="fw-semibold mb-4">
                        {{ $ekskul->nama_eskul }}
                    </h3>


                    {{-- Pembina --}}
                    <div class="mb-4">

                        <small class="text-muted d-block mb-1">
                            <i class="ti ti-user me-1"></i>
                            Nama Pembina
                        </small>

                        <h6 class="mb-0">
                            {{ $ekskul->nama_pembina }}
                        </h6>

                    </div>


                    {{-- Jadwal --}}
                    <div class="mb-4">

                        <small class="text-muted d-block mb-1">
                            <i class="ti ti-calendar me-1"></i>
                            Jadwal Latihan
                        </small>

                        <h6 class="mb-0">
                            {{ $ekskul->jadwal_latihan }}
                        </h6>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="mb-4">

                        <small class="text-muted d-block mb-2">
                            Deskripsi
                        </small>

                        <p class="text-muted mb-0">
                            {{ $ekskul->deskripsi }}
                        </p>

                    </div>


                    <hr>


                    {{-- Button --}}
                    <div class="d-flex gap-2 mt-4">

                        <a href="{{ route('admin.ekskul.edit', $ekskul->id) }}"
                           class="btn btn-primary">

                            <i class="ti ti-edit me-1"></i>
                            Edit

                        </a>


                        <form action="{{ route('admin.ekskul.destroy', $ekskul->id) }}"
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


                        <a href="{{ route('admin.ekskul.index') }}"
                           class="btn btn-light border">

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

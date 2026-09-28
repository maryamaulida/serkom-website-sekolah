@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <a href="{{ route('admin.guru.index') }}"
           class="text-muted text-decoration-none">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali ke Data Guru
        </a>

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div>
                <h4 class="fw-semibold mb-1">
                    Detail Guru
                </h4>

                <p class="text-muted mb-0">
                    Informasi lengkap data guru.
                </p>
            </div>

            <div class="d-flex gap-2">

                {{-- Edit --}}
                @if(Auth::user()->role === 'Admin')
                <a href="{{ route('admin.guru.edit', $guru->id) }}"
                   class="btn btn-light border">
                    <i class="ti ti-edit me-1"></i>
                    Edit
                </a>

                {{-- Hapus --}}

                <form action="{{ route('admin.guru.destroy', $guru->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="ti ti-trash me-1"></i>
                        Hapus
                    </button>

                </form>
                @endif

            </div>
        </div>
    </div>


    {{-- Detail --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                {{-- Foto --}}
                <div class="col-lg-4 text-center">

                    @if ($guru->foto)

                        <img src="{{ asset('storage/' . $guru->foto) }}"
                             class="rounded-3"
                             style="width: 260px; height: 300px; object-fit: cover;"
                             alt="Foto {{ $guru->nama_guru }}">

                    @else

                        <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                             class="rounded-3"
                             style="width: 260px; height: 300px; object-fit: cover;"
                             alt="Foto Guru">

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-8">

                    <h3 class="fw-semibold mb-1">
                        {{ $guru->nama_guru }}
                    </h3>

                    <p class="text-muted mb-4">
                        {{ $guru->mapel }}
                    </p>


                    <div class="row g-4">

                        {{-- NIP --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                NIP
                            </div>

                            <div class="fw-semibold">
                                {{ $guru->nip ?? '-' }}
                            </div>

                        </div>


                        {{-- Mata Pelajaran --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Mata Pelajaran
                            </div>

                            <div class="fw-semibold">
                                {{ $guru->mapel }}
                            </div>

                        </div>


                        {{-- Jabatan --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Jabatan
                            </div>

                            <span class="badge bg-primary-subtle text-primary">
                                {{ $guru->jabatan }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

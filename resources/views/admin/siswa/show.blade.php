@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <a href="{{ route('admin.siswa.index') }}"
           class="text-muted text-decoration-none">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali ke Data Siswa
        </a>

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div>
                <h4 class="fw-semibold mb-1">
                    Detail Siswa
                </h4>

                <p class="text-muted mb-0">
                    Informasi lengkap data siswa.
                </p>
            </div>

            <div class="d-flex gap-2">

                {{-- Edit --}}
                @if(Auth::user()->role === 'Admin')
                <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                   class="btn btn-light border">
                    <i class="ti ti-edit me-1"></i>
                    Edit
                </a>

                {{-- Hapus --}}
                <form action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">
                        <i class="ti ti-trash me-1"></i>
                        Hapus
                    </button>

                </form>
                @endif

            </div>

        </div>

    </div>


    {{-- Detail Siswa --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                {{-- Foto --}}
                <div class="col-lg-4 text-center">

                    @if ($siswa->foto)

                        <img src="{{ asset('storage/' . $siswa->foto) }}"
                             class="rounded-3"
                             style="width: 260px; height: 300px; object-fit: cover;"
                             alt="Foto {{ $siswa->nama }}">

                    @else

                        <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                             class="rounded-3"
                             style="width: 260px; height: 300px; object-fit: cover;"
                             alt="Foto Siswa">

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-8">

                    <h3 class="fw-semibold mb-1">
                        {{ $siswa->nama }}
                    </h3>

                    <p class="text-muted mb-4">
                        Siswa
                    </p>


                    <div class="row g-4">

                        {{-- NISN --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                NISN
                            </div>

                            <div class="fw-semibold">
                                {{ $siswa->nisn }}
                            </div>

                        </div>


                        {{-- Tahun Masuk --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Tahun Masuk
                            </div>

                            <div class="fw-semibold">
                                {{ $siswa->tahun_masuk }}
                            </div>

                        </div>


                        {{-- Jenis Kelamin --}}
                        <div class="col-md-6">

                            <div class="text-muted small mb-1">
                                Jenis Kelamin
                            </div>

                            @if ($siswa->jenis_kelamin == 'Laki-Laki')

                                <span class="badge bg-primary-subtle text-primary">
                                    {{ $siswa->jenis_kelamin }}
                                </span>

                            @else

                                <span class="badge bg-danger-subtle text-danger">
                                    {{ $siswa->jenis_kelamin }}
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

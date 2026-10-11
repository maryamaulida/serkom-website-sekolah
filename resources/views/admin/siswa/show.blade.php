@extends('layouts.admin')

@section('content')

<style>
    .siswa-cover {
        height: 110px;
        background: linear-gradient(135deg, #0085db 0%, #46caeb 100%);
    }

    .siswa-photo {
        width: 190px;
        height: 230px;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 6px 18px rgba(17, 28, 45, 0.15);
        margin-top: -70px;
    }

    .siswa-photo-empty {
        width: 190px;
        height: 230px;
        border: 5px solid #fff;
        box-shadow: 0 6px 18px rgba(17, 28, 45, 0.15);
        margin-top: -70px;
        background: #e7ecf0;
    }

    .siswa-info-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px;
        border: 1px solid var(--bs-border-color);
        border-radius: 14px;
        height: 100%;
        transition: box-shadow .2s ease, border-color .2s ease;
    }

    .siswa-info-item:hover {
        border-color: #0085db;
        box-shadow: 0 4px 14px rgba(0, 133, 219, 0.12);
    }

    .siswa-info-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 22px;
    }
</style>

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <a href="{{ route('admin.siswa.index') }}"
           class="text-muted text-decoration-none d-inline-flex align-items-center">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali ke Data Siswa
        </a>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">

            <div>
                <h4 class="fw-semibold mb-1">Detail Siswa</h4>
                <p class="text-muted mb-0">
                    Informasi lengkap data siswa.
                </p>
            </div>

            @if(Auth::user()->role === 'Admin')
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                       class="btn btn-light border d-inline-flex align-items-center">
                        <i class="ti ti-edit me-1"></i>
                        Edit
                    </a>

                    <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-outline-danger d-inline-flex align-items-center">
                            <i class="ti ti-trash me-1"></i>
                            Hapus
                        </button>

                    </form>

                </div>
            @endif

        </div>
    </div>


    {{-- Detail Siswa --}}
    <div class="card border-0 shadow-sm overflow-hidden">

        {{-- Cover --}}
        <div class="siswa-cover"></div>

        <div class="card-body px-4 pb-4 pt-0">

            <div class="row g-4">

                {{-- Foto --}}
                <div class="col-lg-3 text-center">

                    @if ($siswa->foto)

                        <img src="{{ asset('storage/' . $siswa->foto) }}"
                             class="siswa-photo rounded-4"
                             alt="Foto {{ $siswa->nama }}">

                    @else

                        <div class="siswa-photo-empty rounded-4 mx-auto d-flex align-items-center justify-content-center">

                            <i class="ti ti-user text-muted"
                               style="font-size: 80px;">
                            </i>

                        </div>

                    @endif

                </div>


                {{-- Informasi --}}
                <div class="col-lg-9 pt-lg-3">

                    {{-- Nama --}}
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-1">

                        <h3 class="fw-semibold mb-0">
                            {{ $siswa->nama }}
                        </h3>

                        @if ($siswa->jenis_kelamin == 'Laki-Laki')

                            <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2">
                                {{ $siswa->jenis_kelamin }}
                            </span>

                        @else

                            <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2">
                                {{ $siswa->jenis_kelamin }}
                            </span>

                        @endif

                    </div>

                    <p class="text-muted mb-4">
                        Siswa angkatan {{ $siswa->tahun_masuk }}
                    </p>


                    {{-- Informasi Siswa --}}
                    <div class="row g-3">

                        {{-- NISN --}}
                        <div class="col-md-6">

                            <div class="siswa-info-item">

                                <div class="siswa-info-icon bg-light-primary text-primary">
                                    <i class="ti ti-id"></i>
                                </div>

                                <div>
                                    <div class="text-muted small">
                                        NISN
                                    </div>

                                    <div class="fw-semibold text-dark">
                                        {{ $siswa->nisn }}
                                    </div>
                                </div>

                            </div>

                        </div>


                        {{-- Tahun Masuk --}}
                        <div class="col-md-6">

                            <div class="siswa-info-item">

                                <div class="siswa-info-icon bg-light-success text-success">
                                    <i class="ti ti-calendar"></i>
                                </div>

                                <div>
                                    <div class="text-muted small">
                                        Tahun Masuk
                                    </div>

                                    <div class="fw-semibold text-dark">
                                        {{ $siswa->tahun_masuk }}
                                    </div>
                                </div>

                            </div>

                        </div>


                        {{-- Jenis Kelamin --}}
                        <div class="col-md-6">

                            <div class="siswa-info-item">

                                <div class="siswa-info-icon bg-light-warning text-warning">
                                    <i class="ti ti-gender-bigender"></i>
                                </div>

                                <div>
                                    <div class="text-muted small">
                                        Jenis Kelamin
                                    </div>

                                    <div class="fw-semibold text-dark">
                                        {{ $siswa->jenis_kelamin }}
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

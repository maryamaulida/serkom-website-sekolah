@extends('layouts.admin')

@section('content')

<style>
    .guru-cover {
        height: 110px;
        background: linear-gradient(135deg, #0085db 0%, #46caeb 100%);
    }
    .guru-photo {
        width: 190px;
        height: 230px;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 6px 18px rgba(17, 28, 45, 0.15);
        margin-top: -70px;
    }
    .guru-info-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px;
        border: 1px solid var(--bs-border-color);
        border-radius: 14px;
        height: 100%;
        transition: box-shadow .2s ease, border-color .2s ease;
    }
    .guru-info-item:hover {
        border-color: #0085db;
        box-shadow: 0 4px 14px rgba(0, 133, 219, 0.12);
    }
    .guru-info-icon {
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

        <a href="{{ route('admin.guru.index') }}"
           class="text-muted text-decoration-none d-inline-flex align-items-center">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali ke Data Guru
        </a>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">

            <div>
                <h4 class="fw-semibold mb-1">Detail Guru</h4>
                <p class="text-muted mb-0">Informasi lengkap data guru.</p>
            </div>

            @if(Auth::user()->role === 'Admin')
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                       class="btn btn-light border d-inline-flex align-items-center">
                        <i class="ti ti-edit me-1"></i>
                        Edit
                    </a>

                    <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
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


    {{-- Detail --}}
    <div class="card border-0 shadow-sm overflow-hidden">

        {{-- Cover --}}
        <div class="guru-cover"></div>

        <div class="card-body px-4 pb-4 pt-0">
            <div class="row g-4">

                {{-- Foto --}}
                <div class="col-lg-3 text-center">
                    <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : asset('assets/images/profile/user1.jpg') }}"
                         class="guru-photo rounded-4"
                         alt="Foto {{ $guru->nama_guru }}">
                </div>

                {{-- Informasi --}}
                <div class="col-lg-9 pt-lg-3">

                    {{-- Nama --}}
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                        <h3 class="fw-semibold mb-0">{{ $guru->nama_guru }}</h3>
                        <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2">
                            {{ $guru->jabatan }}
                        </span>
                    </div>

                    <p class="text-muted mb-4">Guru {{ $guru->mapel }}</p>

                    {{-- Info --}}
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="guru-info-item">
                                <div class="guru-info-icon bg-light-primary text-primary">
                                    <i class="ti ti-id"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">NIP</div>
                                    <div class="fw-semibold text-dark">{{ $guru->nip ?? '-' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="guru-info-item">
                                <div class="guru-info-icon bg-light-success text-success">
                                    <i class="ti ti-book"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Mata Pelajaran</div>
                                    <div class="fw-semibold text-dark">{{ $guru->mapel }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="guru-info-item">
                                <div class="guru-info-icon bg-light-warning text-warning">
                                    <i class="ti ti-briefcase"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Jabatan</div>
                                    <div class="fw-semibold text-dark">{{ $guru->jabatan }}</div>
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

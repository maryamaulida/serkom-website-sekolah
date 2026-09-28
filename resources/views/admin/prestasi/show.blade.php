@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <a href="{{ route('admin.prestasi.index') }}"
               class="text-muted text-decoration-none">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Prestasi

            </a>

            <h4 class="fw-bold mt-2 mb-1">
                Detail Prestasi
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap prestasi sekolah
            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
               class="btn btn-warning">

                <i class="ti ti-edit me-1"></i>
                Edit

            </a>

            <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger">

                    <i class="ti ti-trash me-1"></i>
                    Hapus

                </button>

            </form>

        </div>

    </div>

    {{-- Detail --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Foto --}}
                <div class="col-lg-5">

                    <div class="rounded overflow-hidden"
                         style="background: #f5f7fa;">

                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                             alt="{{ $prestasi->nama_prestasi }}"
                             class="w-100"
                             style="height: 350px;
                                    object-fit: cover;">

                    </div>

                </div>

                {{-- Informasi --}}
                <div class="col-lg-7">

                    <span class="badge bg-light-primary text-primary mb-3">
                        Tahun {{ $prestasi->tahun_ajaran }}
                    </span>

                    <h3 class="fw-bold mb-3">
                        {{ $prestasi->nama_prestasi }}
                    </h3>

                    <hr>

                    <h6 class="fw-bold">
                        Deskripsi
                    </h6>

                    <p class="text-muted"
                       style="line-height: 1.8;">

                        {{ $prestasi->deskripsi }}

                    </p>

                    <div class="mt-4">

                        <div class="mb-2">

                            <small class="text-muted d-block">
                                Tahun Ajaran
                            </small>

                            <span class="fw-semibold">
                                {{ $prestasi->tahun_ajaran }}
                            </span>

                        </div>

                        <div class="mb-2">

                            <small class="text-muted d-block">
                                Ditambahkan
                            </small>

                            <span class="fw-semibold">
                                {{ $prestasi->created_at->format('d M Y, H:i') }}
                            </span>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Terakhir diperbarui
                            </small>

                            <span class="fw-semibold">
                                {{ $prestasi->updated_at->format('d M Y, H:i') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

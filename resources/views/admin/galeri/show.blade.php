@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

        <div>

            <a href="{{ route('admin.galeri.index') }}"
               class="text-muted text-decoration-none d-inline-flex align-items-center mb-2">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Galeri

            </a>

            <h4 class="fw-semibold mb-1">
                Detail Galeri
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap dokumentasi sekolah
            </p>

        </div>


        {{-- Tombol --}}
        @if(Auth::user()->role === 'Admin')

            <div class="d-flex gap-2">

                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                   class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">

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


    {{-- Card Detail --}}
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                {{-- Foto / Video --}}
                <div class="col-lg-5">

                    <div class="text-center">

                        @if($galeri->kategori == 'Foto')

                            <img src="{{ asset('storage/' . $galeri->file) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="img-fluid rounded-3"
                                 style="
                                    width: 100%;
                                    height: 300px;
                                    object-fit: cover;
                                 ">

                        @else

                            <video controls
                                   class="rounded-3"
                                   style="
                                      width: 100%;
                                      height: 300px;
                                      object-fit: cover;
                                      background: #000;
                                   ">

                                <source src="{{ asset('storage/' . $galeri->file) }}">

                                Browser kamu tidak mendukung video.

                            </video>

                        @endif

                    </div>

                </div>


                {{-- Informasi --}}
                <div class="col-lg-7">

                    {{-- Judul --}}
                    <h3 class="fw-semibold mb-4">

                        {{ $galeri->judul }}

                    </h3>


                    {{-- Kategori --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 120px;">

                            <i class="ti ti-category me-2"></i>
                            Kategori

                        </div>

                        <div>

                            :

                            @if($galeri->kategori == 'Foto')

                                <span class="badge bg-primary-subtle text-primary ms-1">

                                    <i class="ti ti-photo me-1"></i>
                                    Foto

                                </span>

                            @else

                                <span class="badge bg-danger-subtle text-danger ms-1">

                                    <i class="ti ti-video me-1"></i>
                                    Video

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Tanggal --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 120px;">

                            <i class="ti ti-calendar me-2"></i>
                            Tanggal

                        </div>

                        <div>

                            :
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}

                        </div>

                    </div>


                </div>

            </div>


            {{-- Keterangan --}}
            <div class="border-top mt-4 pt-4">

                <div class="p-4 rounded-3"
                     style="background-color: #f8f9fa;">

                    <h6 class="fw-semibold mb-3">

                        <i class="ti ti-notes me-2"></i>
                        Keterangan

                    </h6>

                    <div class="text-secondary"
                         style="
                            line-height: 1.8;
                            white-space: pre-line;
                            text-align: justify;
                         ">

                        {{ $galeri->keterangan ?: '-' }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

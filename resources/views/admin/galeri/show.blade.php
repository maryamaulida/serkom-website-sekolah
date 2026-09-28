@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-semibold mb-1">
                Detail Galeri
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap dokumentasi sekolah
            </p>

        </div>

        <a href="{{ route('admin.galeri.index') }}"
            class="btn btn-light">

            Kembali

        </a>

    </div>


    <div class="card">

        <div class="card-body">


            {{-- File --}}
            <div class="text-center mb-4">

                @if($galeri->kategori == 'Foto')

                    <img src="{{ asset('storage/' . $galeri->file) }}"
                        class="img-fluid rounded"
                        style="max-height: 450px;"
                        alt="{{ $galeri->judul }}">

                @else

                    <video controls
                        class="rounded"
                        style="width: 100%; max-height: 450px;">

                        <source src="{{ asset('storage/' . $galeri->file) }}">

                        Browser kamu tidak mendukung video.

                    </video>

                @endif

            </div>


            <div class="d-flex justify-content-between align-items-start">

                <div>

                    <h4 class="fw-semibold mb-2">
                        {{ $galeri->judul }}
                    </h4>

                    <p class="text-muted mb-0">

                        <i class="ti ti-calendar me-1"></i>

                        {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}

                    </p>

                </div>


                @if($galeri->kategori == 'Foto')

                    <span class="badge bg-primary">
                        Foto
                    </span>

                @else

                    <span class="badge bg-danger">
                        Video
                    </span>

                @endif

            </div>


            <hr>


            {{-- Keterangan --}}
            <div class="mt-4">

                <h6 class="fw-semibold mb-2">
                    Keterangan
                </h6>

                <p class="text-muted"
                    style="white-space: pre-line; line-height: 1.8;">

                    {{ $galeri->keterangan }}

                </p>

            </div>


            {{-- Tombol --}}
            <div class="border-top pt-4 mt-4">

                <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                    class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                    method="POST"
                    class="d-inline"
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

        </div>

    </div>

</div>

@endsection

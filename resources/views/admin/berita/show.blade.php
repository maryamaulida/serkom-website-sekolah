@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

        <div>

            <a href="{{ route('admin.berita.index') }}"
               class="text-decoration-none text-muted d-inline-flex align-items-center mb-2">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Berita

            </a>

            <h4 class="fw-semibold mb-1">
                Detail Berita
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap berita sekolah
            </p>

        </div>


        {{-- Tombol --}}
        @if(Auth::user()->role === 'Admin')

            <div class="d-flex gap-2">

                <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                   class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                      method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">

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


    {{-- Card --}}
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-4">

            <div class="row g-4 align-items-center">

                {{-- Gambar --}}
                <div class="col-lg-5">

                    <div class="text-center">

                        @if($berita->gambar)

                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="img-fluid rounded-3"
                                 style="
                                    width: 100%;
                                    max-width: 500px;
                                    height: 300px;
                                    object-fit: cover;
                                 ">

                        @else

                            <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                                 alt="Default Image"
                                 class="img-fluid rounded-3"
                                 style="
                                    width: 100%;
                                    max-width: 500px;
                                    height: 300px;
                                    object-fit: cover;
                                 ">

                        @endif

                    </div>

                </div>


                {{-- Informasi Berita --}}
                <div class="col-lg-7">

                    {{-- Status --}}
                    <div class="mb-3">

                        @if($berita->status == 'Publish')

                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">

                                <i class="ti ti-circle-check me-1"></i>
                                Published

                            </span>

                        @else

                            <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">

                                <i class="ti ti-file-text me-1"></i>
                                Draft

                            </span>

                        @endif

                    </div>


                    {{-- Judul --}}
                    <h3 class="fw-semibold text-dark mb-4">

                        {{ $berita->judul }}

                    </h3>


                    {{-- Tanggal --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 120px;">

                            <i class="ti ti-calendar me-2"></i>
                            Tanggal

                        </div>

                        <div>

                            :
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                        </div>

                    </div>


                    {{-- Dibuat oleh --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 120px;">

                            <i class="ti ti-user me-2"></i>
                            Dibuat oleh

                        </div>

                        <div>

                            :
                            {{ $berita->user->name ?? 'Admin' }}

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="d-flex align-items-center mb-3">

                        <div class="text-muted"
                             style="width: 120px;">

                            <i class="ti ti-check me-2"></i>
                            Status

                        </div>

                        <div>

                            :

                            @if($berita->status == 'Publish')

                                <span class="text-success fw-medium ms-1">
                                    Publish
                                </span>

                            @else

                                <span class="text-secondary fw-medium ms-1">
                                    Draft
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- Isi Berita --}}
            <div class="border-top mt-4 pt-4">

                <div class="p-4 rounded-3"
                     style="background-color: #f8f9fa;">

                    <h6 class="fw-semibold mb-3">

                        <i class="ti ti-notes me-2"></i>
                        Isi Berita

                    </h6>

                    <div class="text-secondary"
                         style="
                            line-height: 1.8;
                            white-space: pre-line;
                            text-align: justify;
                         ">

                        {!! e($berita->isi) !!}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection 

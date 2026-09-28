@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Profile Sekolah
            </h4>

            <p class="text-muted mb-0">
                Informasi identitas dan profil sekolah
            </p>
        </div>


        {{-- Tombol Tambah hanya muncul jika belum ada profile --}}
        @if ($profile->isEmpty() && Auth::user()->role === 'Admin')

            <a href="{{ route('admin.profile.create') }}"
               class="btn btn-primary">

                <i class="ti ti-plus me-1"></i>
                Tambah Profile

            </a>

        @endif

    </div>


    {{-- Jika belum ada data --}}
    @if ($profile->isEmpty() && Auth::user()->role === 'Admin')

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <div class="mb-3">

                    <i class="ti ti-school"
                       style="font-size: 60px; color: #5D87FF;">
                    </i>

                </div>

                <h5 class="fw-semibold">
                    Belum Ada Profile Sekolah
                </h5>

                @if(Auth::user()->role === 'Admin')
                <p class="text-muted mb-4">
                    Silakan tambahkan informasi profile sekolah terlebih dahulu.
                </p>

                <a href="{{ route('admin.profile.create') }}"
                   class="btn btn-primary">

                    <i class="ti ti-plus me-1"></i>
                    Tambah Profile

                </a>
                @endif

            </div>

        </div>

    @else

        {{-- Data Profile --}}
        @foreach ($profile as $item)

            {{-- Profile Utama --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        {{-- Foto Sekolah --}}
                        <div class="col-lg-4 mb-4 mb-lg-0">

                            <div class="position-relative">

                                @if ($item->foto)

                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         class="img-fluid rounded-4 w-100"
                                         style="height: 250px; object-fit: cover;"
                                         alt="Foto {{ $item->nama_sekolah }}">

                                @else

                                    <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                                         style="height: 250px;">

                                        <i class="ti ti-school text-muted"
                                           style="font-size: 70px;">
                                        </i>

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- Informasi Sekolah --}}
                        <div class="col-lg-8">

                            <div class="d-flex align-items-center mb-3">

                                {{-- Logo --}}
                                @if ($item->logo)

                                    <img src="{{ asset('storage/' . $item->logo) }}"
                                         width="65"
                                         height="65"
                                         class="rounded-3 me-3"
                                         style="object-fit: contain;"
                                         alt="Logo {{ $item->nama_sekolah }}">

                                @else

                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center me-3"
                                         style="width: 65px; height: 65px;">

                                        <i class="ti ti-school text-muted fs-4"></i>

                                    </div>

                                @endif


                                <div>

                                    <h3 class="fw-semibold mb-1">
                                        {{ $item->nama_sekolah }}
                                    </h3>

                                    <span class="badge bg-light-primary text-primary">
                                        Profile Sekolah
                                    </span>

                                </div>

                            </div>


                            {{-- Informasi --}}
                            <div class="row">

                                {{-- Kepala Sekolah --}}
                                <div class="col-md-6 mb-3">

                                    <small class="text-muted d-block mb-1">
                                        Kepala Sekolah
                                    </small>

                                    <h6 class="fw-semibold mb-0">
                                        {{ $item->kepala_sekolah }}
                                    </h6>

                                </div>


                                {{-- NPSN --}}
                                <div class="col-md-6 mb-3">

                                    <small class="text-muted d-block mb-1">
                                        NPSN
                                    </small>

                                    <h6 class="fw-semibold mb-0">
                                        {{ $item->npsn }}
                                    </h6>

                                </div>


                                {{-- Tahun Berdiri --}}
                                <div class="col-md-6 mb-3">

                                    <small class="text-muted d-block mb-1">
                                        Tahun Berdiri
                                    </small>

                                    <h6 class="fw-semibold mb-0">
                                        {{ $item->tahun_berdiri }}
                                    </h6>

                                </div>


                                {{-- Alamat --}}
                                <div class="col-md-6 mb-3">

                                    <small class="text-muted d-block mb-1">
                                        Alamat
                                    </small>

                                    <h6 class="fw-semibold mb-0">
                                        {{ $item->alamat }}
                                    </h6>

                                </div>

                            </div>


                            {{-- Tombol Aksi --}}
                            @if(Auth::user()->role === 'Admin')
                            <div class="mt-2">

                                {{-- Edit saja --}}
                                <a href="{{ route('admin.profile.edit', $item->id_profile) }}"
                                   class="btn btn-primary">

                                    <i class="ti ti-edit me-1"></i>
                                    Edit

                                </a>

                            </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- Visi & Misi --}}
            <div class="row">

                {{-- Visi --}}
                <div class="col-lg-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div class="d-flex align-items-center mb-3">

                                <div class="rounded-3 bg-light-primary p-2 me-3">

                                    <i class="ti ti-target text-primary fs-5"></i>

                                </div>

                                <h5 class="fw-semibold mb-0">
                                    Visi Sekolah
                                </h5>

                            </div>

                            <p class="text-muted mb-0">
                                {{ $item->visi }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Misi --}}
                <div class="col-lg-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div class="d-flex align-items-center mb-3">

                                <div class="rounded-3 bg-light-primary p-2 me-3">

                                    <i class="ti ti-list-check text-primary fs-5"></i>

                                </div>

                                <h5 class="fw-semibold mb-0">
                                    Misi Sekolah
                                </h5>

                            </div>

                            <p class="text-muted mb-0">
                                {{ $item->misi }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Deskripsi --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-3">

                        <div class="rounded-3 bg-light-primary p-2 me-3">

                            <i class="ti ti-school text-primary fs-5"></i>

                        </div>

                        <h5 class="fw-semibold mb-0">
                            Deskripsi Sekolah
                        </h5>

                    </div>

                    <p class="text-muted mb-0">
                        {{ $item->deskripsi }}
                    </p>

                </div>

            </div>

        @endforeach

    @endif

</div>

@endsection

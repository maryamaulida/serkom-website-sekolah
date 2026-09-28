@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <a href="{{ route('admin.berita.index') }}"
               class="text-muted text-decoration-none">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Data Berita

            </a>

            <h4 class="fw-semibold mt-3 mb-1">
                Detail Berita
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap berita sekolah
            </p>

        </div>


        <a href="{{ route('admin.berita.edit', ['berita' => $berita->id_berita]) }}"
           class="btn btn-primary">

            <i class="ti ti-edit me-1"></i>
            Edit Berita

        </a>

    </div>


    {{-- Detail Berita --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- Gambar --}}
            @if ($berita->gambar)

                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     class="img-fluid rounded mb-4"
                     alt="{{ $berita->judul }}"
                     style="width: 100%; height: 350px; object-fit: cover;">

            @else

                <img src="{{ asset('assets/images/profile/user1.jpg') }}"
                     class="img-fluid rounded mb-4"
                     alt="Gambar Berita"
                     style="width: 100%; height: 350px; object-fit: cover;">

            @endif


            {{-- Judul --}}
            <h3 class="fw-semibold mb-3">
                {{ $berita->judul }}
            </h3>


            {{-- Informasi --}}
            <div class="d-flex flex-wrap gap-4 mb-4">

                {{-- Tanggal --}}
                <div>

                    <small class="text-muted d-block mb-1">
                        <i class="ti ti-calendar me-1"></i>
                        Tanggal
                    </small>

                    <span class="fw-semibold">
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                    </span>

                </div>


                {{-- Pembuat --}}
                <div>

                    <small class="text-muted d-block mb-1">
                        <i class="ti ti-user me-1"></i>
                        Dibuat oleh
                    </small>

                    <span class="fw-semibold">
                        {{ $berita->user->name ?? '-' }}
                    </span>

                </div>


                {{-- Status --}}
                <div>

                    <small class="text-muted d-block mb-1">
                        Status
                    </small>

                    @if ($berita->status == 'Publish')

                        <span class="badge bg-success">
                            Publish
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Draft
                        </span>

                    @endif

                </div>

            </div>


            <hr>


            {{-- Isi Berita --}}
            <div class="mt-4">

                <h5 class="fw-semibold mb-3">
                    Isi Berita
                </h5>

                <div class="text-muted"
                     style="line-height: 1.8;">

                    {!! nl2br(e($berita->isi)) !!}

                </div>

            </div>


            <hr class="mt-4">


            {{-- Button --}}
            <div class="d-flex gap-2 mt-4">

                <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                   class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">

                        <i class="ti ti-trash me-1"></i>
                        Hapus

                    </button>

                </form>


                <a href="{{ route('admin.berita.index') }}"
                   class="btn btn-light border">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection

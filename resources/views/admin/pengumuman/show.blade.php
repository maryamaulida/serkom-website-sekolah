@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-semibold mb-1">
                Detail Pengumuman
            </h4>

            <p class="text-muted mb-0">
                Informasi lengkap pengumuman sekolah
            </p>

        </div>

        <a href="{{ route('admin.pengumuman.index') }}"
            class="btn btn-light">

            Kembali

        </a>

    </div>


    {{-- Detail --}}
    <div class="card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-start mb-4">

                <div>

                    <h4 class="fw-semibold mb-2">
                        {{ $pengumuman->judul }}
                    </h4>

                    <div class="text-muted">

                        <i class="ti ti-calendar me-1"></i>

                        {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}

                        <span class="mx-2">
                            •
                        </span>

                        <i class="ti ti-user me-1"></i>

                        {{ $pengumuman->user->name ?? '-' }}

                    </div>

                </div>


                {{-- Status --}}
                @if($pengumuman->status == 'Publish')

                    <span class="badge bg-success">
                        Publish
                    </span>

                @else

                    <span class="badge bg-secondary">
                        Draft
                    </span>

                @endif

            </div>


            <hr>


            {{-- Isi --}}
            <div class="mt-4">

                <h6 class="fw-semibold mb-3">
                    Isi Pengumuman
                </h6>

                <div style="white-space: pre-line; line-height: 1.8;">

                    {{ $pengumuman->isi }}

                </div>

            </div>


            {{-- Tombol --}}
            <div class="border-top pt-4 mt-4">

                <a href="{{ route('admin.pengumuman.edit', $pengumuman->id_pengumuman) }}"
                    class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>
                    Edit

                </a>


                <form action="{{ route('admin.pengumuman.destroy', $pengumuman->id_pengumuman) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">

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

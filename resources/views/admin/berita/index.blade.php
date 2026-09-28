@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Data Berita
            </h4>

            <p class="text-muted mb-0">
                Kelola berita dan informasi sekolah
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Berita

        </a>

    </div>


    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3">

                {{-- Search --}}
                <div class="col-md-8">

                    <div class="position-relative">

                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                        <input type="text"
                               id="searchBerita"
                               class="form-control ps-5"
                               placeholder="Cari judul berita...">

                    </div>

                </div>


                {{-- Filter Status --}}
                <div class="col-md-4">

                    <select id="filterStatus"
                            class="form-select">

                        <option value="">
                            Semua Status
                        </option>

                        <option value="Publish">
                            Publish
                        </option>

                        <option value="Draft">
                            Draft
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>


    {{-- Tabel Berita --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="90">
                                Gambar
                            </th>

                            <th>
                                Judul Berita
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Dibuat Oleh
                            </th>

                            <th>
                                Isi
                            </th>

                            <th width="160" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="beritaTable">

                        @forelse ($beritas as $berita)

                            <tr class="berita-item"
                                data-judul="{{ strtolower($berita->judul) }}"
                                data-status="{{ $berita->status }}">

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Gambar --}}
                                <td>

                                    @if ($berita->gambar)

                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                             alt="{{ $berita->judul }}"
                                             width="70"
                                             height="55"
                                             style="
                                                object-fit: cover;
                                                border-radius: 8px;
                                             ">

                                    @else

                                        <div class="d-flex align-items-center justify-content-center"
                                             style="
                                                width: 70px;
                                                height: 55px;
                                                background: #f5f7fa;
                                                border-radius: 8px;
                                             ">

                                            <i class="ti ti-news text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- Judul --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $berita->judul }}

                                    </span>

                                </td>


                                {{-- Tanggal --}}
                                <td>

                                    <span class="text-muted">

                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if ($berita->status == 'Publish')

                                        <span class="badge bg-success">
                                            Publish
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>

                                    @endif

                                </td>


                                {{-- Dibuat Oleh --}}
                                <td>

                                    <span class="text-muted">

                                        {{ $berita->user->name ?? '-' }}

                                    </span>

                                </td>


                                {{-- Isi --}}
                                <td>

                                    <span class="text-muted">

                                        {{ Str::limit(strip_tags($berita->isi), 70) }}

                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.berita.show', $berita->id_berita) }}"
                                           class="btn btn-light border"
                                           title="Detail">

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.berita.edit', ['berita' => $berita->id_berita]) }}"
                                           class="btn btn-warning"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger"
                                                    title="Hapus">

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- Data Kosong --}}
                            <tr>

                                <td colspan="8">

                                    <div class="text-center py-5">

                                        <i class="ti ti-news fs-1 text-muted"></i>

                                        <h5 class="mt-3">
                                            Belum Ada Berita
                                        </h5>

                                        <p class="text-muted mb-3">
                                            Silakan tambahkan berita sekolah terlebih dahulu.
                                        </p>

                                        <a href="{{ route('admin.berita.create') }}"
                                           class="btn btn-primary">

                                            <i class="ti ti-plus me-1"></i>

                                            Tambah Berita

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- Search & Filter Javascript --}}
<script>

    const searchInput = document.getElementById('searchBerita');

    const filterStatus = document.getElementById('filterStatus');

    function filterBerita() {

        const search = searchInput.value.toLowerCase();

        const status = filterStatus.value;

        const rows = document.querySelectorAll('.berita-item');

        rows.forEach(function (row) {

            const judul = row.dataset.judul;

            const cardStatus = row.dataset.status;

            const cocokJudul = judul.includes(search);

            const cocokStatus =
                status === '' || cardStatus === status;

            if (cocokJudul && cocokStatus) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }

    searchInput.addEventListener('input', filterBerita);

    filterStatus.addEventListener('change', filterBerita);

</script>

@endsection

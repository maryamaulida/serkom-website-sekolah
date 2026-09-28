@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Galeri Sekolah
            </h4>

            <p class="text-muted mb-0">
                Kelola dokumentasi foto dan video sekolah
            </p>
        </div>

        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Galeri

        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="ti ti-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3">

                {{-- Search --}}
                <div class="col-md-8">

                    <div class="position-relative">

                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                        <input type="text"
                               id="searchGaleri"
                               class="form-control ps-5"
                               placeholder="Cari judul galeri...">

                    </div>

                </div>


                {{-- Filter Kategori --}}
                <div class="col-md-4">

                    <select id="filterKategori"
                            class="form-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        <option value="Foto">
                            Foto
                        </option>

                        <option value="Video">
                            Video
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>


    {{-- Tabel Galeri --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="100">
                                Preview
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Keterangan
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th width="160" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="galeriTable">

                        @forelse($galeris as $galeri)

                            <tr class="galeri-item"
                                data-judul="{{ strtolower($galeri->judul) }}"
                                data-kategori="{{ $galeri->kategori }}">

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Preview --}}
                                <td>

                                    @if($galeri->kategori == 'Foto')

                                        <img src="{{ asset('storage/' . $galeri->file) }}"
                                             alt="{{ $galeri->judul }}"
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

                                            <i class="ti ti-video text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- Judul --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $galeri->judul }}

                                    </span>

                                </td>


                                {{-- Kategori --}}
                                <td>

                                    @if($galeri->kategori == 'Foto')

                                        <span class="badge bg-primary">
                                            Foto
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Video
                                        </span>

                                    @endif

                                </td>


                                {{-- Keterangan --}}
                                <td>

                                    <span class="text-muted">

                                        {{ Str::limit($galeri->keterangan, 80) }}

                                    </span>

                                </td>


                                {{-- Tanggal --}}
                                <td>

                                    <span class="text-muted">

                                        <i class="ti ti-calendar me-1"></i>

                                        {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.galeri.show', $galeri->id) }}"
                                           class="btn btn-light border"
                                           title="Detail">

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                           class="btn btn-warning"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">

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

                                <td colspan="7">

                                    <div class="text-center py-5">

                                        <i class="ti ti-photo fs-1 text-muted"></i>

                                        <h5 class="fw-semibold mt-3">
                                            Belum Ada Galeri
                                        </h5>

                                        <p class="text-muted mb-3">
                                            Belum ada foto atau video sekolah.
                                        </p>

                                        <a href="{{ route('admin.galeri.create') }}"
                                           class="btn btn-primary">

                                            <i class="ti ti-plus me-1"></i>

                                            Tambah Galeri

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

    const searchInput = document.getElementById('searchGaleri');

    const filterKategori = document.getElementById('filterKategori');

    function filterGaleri() {

        const search = searchInput.value.toLowerCase();

        const kategori = filterKategori.value;

        const rows = document.querySelectorAll('.galeri-item');

        rows.forEach(function (row) {

            const judul = row.dataset.judul;

            const itemKategori = row.dataset.kategori;

            const cocokJudul = judul.includes(search);

            const cocokKategori =
                kategori === '' ||
                itemKategori === kategori;

            if (cocokJudul && cocokKategori) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }

    searchInput.addEventListener('input', filterGaleri);

    filterKategori.addEventListener('change', filterGaleri);

</script>

@endsection

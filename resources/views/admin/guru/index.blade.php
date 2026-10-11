@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Guru
            </h4>

            <p class="text-muted mb-0">
                Kelola data guru dan tenaga kependidikan
            </p>
        </div>

        @if(Auth::user()->role === 'Admin')
        <a href="{{ route('admin.guru.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Guru

        </a>
        @endif

    </div>


    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-3">

            <div class="row g-3">

                {{-- Search --}}
                <div class="col-md-8">

                    <div class="position-relative">

                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                        <input type="text"
                               id="searchGuru"
                               class="form-control ps-5"
                               placeholder="Cari nama guru...">

                    </div>

                </div>


                {{-- Filter Jabatan --}}
                <div class="col-md-4">

                    <select id="filterJabatan"
                            class="form-select">

                        <option value="">
                            Semua Jabatan
                        </option>

                        <option value="Guru Mapel">
                            Guru Mapel
                        </option>

                        <option value="Guru Produktif">
                            Guru Produktif
                        </option>

                        <option value="Tenaga Kependidikan">
                            Tenaga Kependidikan
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>


    {{-- Tabel Guru --}}
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
                                Foto
                            </th>

                            <th>
                                Nama Guru
                            </th>

                            <th>
                                Mata Pelajaran
                            </th>

                            <th>
                                Jabatan
                            </th>

                            <th>
                                NIP
                            </th>

                            <th width="160" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="guruTable">

                        @forelse ($gurus as $guru)

                            <tr class="guru-item"
                                data-nama="{{ strtolower($guru->nama_guru) }}"
                                data-jabatan="{{ $guru->jabatan }}">

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Foto --}}
                                <td>

                                    @if ($guru->foto)

                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                             alt="{{ $guru->nama_guru }}"
                                             width="60"
                                             height="60"
                                             style="
                                                object-fit: cover;
                                                border-radius: 8px;
                                             ">

                                    @else

                                        <div class="d-flex align-items-center justify-content-center"
                                             style="
                                                width: 60px;
                                                height: 60px;
                                                background: #f5f7fa;
                                                border-radius: 8px;
                                             ">

                                            <i class="ti ti-user text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- Nama --}}
                                <td>

                                    <span class="fw-semibold guru-nama">

                                        {{ $guru->nama_guru }}

                                    </span>

                                </td>


                                {{-- Mata Pelajaran --}}
                                <td>

                                    <span class="text-muted">

                                        {{ $guru->mapel }}

                                    </span>

                                </td>


                                {{-- Jabatan --}}
                                <td>

                                    @if ($guru->jabatan == 'Guru Mapel')

                                        <span class="badge bg-primary-subtle text-primary">

                                            {{ $guru->jabatan }}

                                        </span>

                                    @elseif ($guru->jabatan == 'Guru Produktif')

                                        <span class="badge bg-success-subtle text-success">

                                            {{ $guru->jabatan }}

                                        </span>

                                    @else

                                        <span class="badge bg-secondary-subtle text-secondary">

                                            {{ $guru->jabatan }}

                                        </span>

                                    @endif

                                </td>


                                {{-- NIP --}}
                                <td>

                                    @if ($guru->nip)

                                        <span class="text-muted">

                                            {{ $guru->nip }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.guru.show', $guru->id_guru ) }}"
                                           class="btn btn-light border"
                                           title="Detail">

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        @if(Auth::user()->role === 'Admin')
                                        <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                           class="btn btn-warning"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>



                                        {{-- Hapus --}}

                                        <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger"
                                                    title="Hapus">

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>
                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- Data Kosong --}}
                            <tr>

                                <td colspan="7">

                                    <div class="text-center py-5">

                                        <i class="ti ti-users fs-1 text-muted"></i>

                                        <h5 class="mt-3 mb-1">
                                            Belum Ada Data Guru
                                        </h5>

                                        @if(Auth::user()->role === 'Admin')
                                        <p class="text-muted mb-3">
                                            Silakan tambahkan data guru terlebih dahulu.
                                        </p>

                                        <a href="{{ route('admin.guru.create') }}"
                                           class="btn btn-primary">

                                            <i class="ti ti-plus me-1"></i>

                                            Tambah Guru

                                        </a>
                                        @endif

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


{{-- Search & Filter --}}
<script>

    const searchInput = document.getElementById('searchGuru');
    const filterJabatan = document.getElementById('filterJabatan');

    function filterGuru() {

        const keyword = searchInput.value.toLowerCase();
        const jabatan = filterJabatan.value;

        const rows = document.querySelectorAll('.guru-item');

        rows.forEach(function (row) {

            const nama = row.dataset.nama;
            const jabatanGuru = row.dataset.jabatan;

            const cocokNama = nama.includes(keyword);

            const cocokJabatan =
                jabatan === '' ||
                jabatanGuru === jabatan;

            if (cocokNama && cocokJabatan) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }

    searchInput.addEventListener('input', filterGuru);

    filterJabatan.addEventListener('change', filterGuru);

</script>

@endsection

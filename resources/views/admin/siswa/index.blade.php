@extends('layouts.admin')

@section('content')

<div class="container-fluid pt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Data Siswa</h4>
            <p class="text-muted mb-0">
                Kelola data siswa SMK YPC Tasikmalaya
            </p>
        </div>

        @if(Auth::user()->role === 'Admin')
        <div class="d-flex flex-wrap align-items-center gap-2">

            <form action="{{ route('admin.siswa.import') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="d-flex flex-wrap align-items-center gap-2">

                @csrf

                <input type="file"
                        name="file"
                        class="form-control"
                        accept=".xlsx,.xls,.csv"
                        required
                        style="width: 230px;">

                <button type="submit" class="btn btn-success">
                    <i class="ti ti-file-spreadsheet me-1"></i>
                    Import Excel
                </button>
            </form>

            <a href="{{ route('admin.siswa.create') }}"
                class="btn btn-primary">
                <i class="ti ti-plus me-1"></i>
                Tambah Siswa
            </a>

        </div>
                @endif
            </div>

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ti ti-check me-2"></i>
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Import gagal!</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            {{-- Search & Filter --}}
            <div class="card border-0 shadow-sm mb-4"
                style="border-radius: 20px;">

                <div class="card-body p-3">

                    <div class="row g-3">

                        {{-- Search --}}
                        <div class="col-md-8">

                            <div class="position-relative">

                                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                                <input type="text"
                                    id="searchSiswa"
                                    class="form-control ps-5"
                                    placeholder="Cari nama siswa..."
                                    style="height: 44px; border-radius: 8px;">

                            </div>

                        </div>

                        {{-- Filter Jenis Kelamin --}}
                        <div class="col-md-4">

                            <select id="filterJenisKelamin"
                                    class="form-select"
                                    style="height: 44px; border-radius: 8px;">

                                <option value="">
                                    Semua Jenis Kelamin
                                </option>

                                <option value="Perempuan">
                                    Perempuan
                                </option>

                                <option value="Laki-Laki">
                                    Laki-Laki
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Card --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th width="60">No</th>
                                    <th width="80">Foto</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                    <th width="180" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($siswas as $siswa)

                                <tr class="siswa-item"
                                    data-nama="{{ strtolower($siswa->nama) }}"
                                    data-jenis-kelamin="{{ $siswa->jenis_kelamin }}">
                                    {{-- No --}}
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Foto --}}
                                    <td>
                                        @if($siswa->foto)
                                            <img src="{{ asset('storage/' . $siswa->foto) }}"
                                                alt="Foto {{ $siswa->nama }}"
                                                class="rounded-circle"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                                style="width: 50px; height: 50px;">
                                                <i class="ti ti-user text-muted fs-5"></i>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Nama --}}
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $siswa->nama }}
                                        </div>
                                    </td>

                                    {{-- NISN --}}
                                    <td>
                                        {{ $siswa->nisn }}
                                    </td>

                                    {{-- Jenis Kelamin --}}
                                    <td>
                                        @if($siswa->jenis_kelamin == 'Laki-Laki')
                                            <span class="badge bg-light-primary text-primary">
                                                Laki-Laki
                                            </span>
                                        @else
                                            <span class="badge bg-light-danger text-danger">
                                                Perempuan
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Tahun Masuk --}}
                                    <td>
                                        {{ $siswa->tahun_masuk }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="text-center">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.siswa.show', $siswa->id_siswa) }}"
                                        class="btn btn-sm btn-light-info"
                                        title="Detail">
                                            <i class="ti ti-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        @if(Auth::user()->role === 'Admin')
                                        <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                        class="btn btn-sm btn-light-warning"
                                        title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-light-danger"
                                                    title="Hapus">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                        </form>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="7" class="text-center py-5">

                                        <div class="mb-3">
                                            <i class="ti ti-users text-muted"
                                            style="font-size: 50px;">
                                            </i>
                                        </div>

                                        <h5 class="fw-semibold">
                                            Belum Ada Data Siswa
                                        </h5>

                                        @if(Auth::user()->role === 'Admin')
                                        <div class="d-flex flex-wrap align-items-center gap-2">

                                            {{-- Form Import Excel --}}
                                            <form action="{{ route('admin.siswa.import') }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                                class="d-flex flex-wrap align-items-center gap-2">

                                                @csrf

                                                <input type="file"
                                                    name="file"
                                                    class="form-control"
                                                    accept=".xlsx,.xls,.csv"
                                                    required
                                                    style="max-width: 230px;">

                                                <button type="submit" class="btn btn-success">
                                                    <i class="ti ti-file-spreadsheet me-1"></i>
                                                    Import Excel
                                                </button>
                                            </form>

                                            {{-- Tombol Tambah Siswa --}}
                                            <a href="{{ route('admin.siswa.create') }}"
                                            class="btn btn-primary">
                                                <i class="ti ti-plus me-1"></i>
                                                Tambah Siswa
                                            </a>

                                        </div>
                                        @endif

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
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('searchSiswa');
        const filterJenisKelamin = document.getElementById('filterJenisKelamin');
        const rows = document.querySelectorAll('.siswa-item');

        function filterSiswa() {

            const keyword = searchInput.value.toLowerCase().trim();
            const jenisKelamin = filterJenisKelamin.value;

            rows.forEach(function (row) {

                const nama = row.getAttribute('data-nama');
                const jenisKelaminSiswa = row.getAttribute('data-jenis-kelamin');

                const cocokNama = nama.includes(keyword);

                const cocokJenisKelamin =
                    jenisKelamin === '' ||
                    jenisKelaminSiswa === jenisKelamin;

                if (cocokNama && cocokJenisKelamin) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }

            });
        }

        searchInput.addEventListener('input', filterSiswa);
        filterJenisKelamin.addEventListener('change', filterSiswa);

    });
</script>

@endsection

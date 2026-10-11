@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Data Ekstrakurikuler
            </h4>

            <p class="text-muted mb-0">
                Kelola data ekstrakurikuler sekolah
            </p>
        </div>

        <a href="{{ route('admin.ekskul.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Ekskul

        </a>

    </div>


    {{-- Search --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="position-relative">

                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                <input type="text"
                       id="searchEkskul"
                       class="form-control ps-5"
                       placeholder="Cari nama ekskul atau pembina...">

            </div>

        </div>

    </div>


    {{-- Tabel Ekskul --}}
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
                                Nama Ekskul
                            </th>

                            <th>
                                Pembina
                            </th>

                            <th>
                                Jadwal Latihan
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="160" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="ekskulTable">

                        @forelse ($ekskuls as $ekskul)

                            <tr class="ekskul-item"
                                data-nama="{{ strtolower($ekskul->nama_eskul) }}"
                                data-pembina="{{ strtolower($ekskul->nama_pembina) }}">

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Gambar --}}
                                <td>

                                    @if ($ekskul->gambar)

                                        <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                                             alt="{{ $ekskul->nama_eskul }}"
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

                                            <i class="ti ti-school text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- Nama Ekskul --}}
                                <td>

                                    <span class="fw-semibold">

                                        {{ $ekskul->nama_eskul }}

                                    </span>

                                </td>


                                {{-- Pembina --}}
                                <td>

                                    <span class="text-muted">

                                        {{ $ekskul->nama_pembina }}

                                    </span>

                                </td>


                                {{-- Jadwal --}}
                                <td>

                                    <span>

                                        <i class="ti ti-calendar me-1 text-muted"></i>

                                        {{ $ekskul->jadwal_latihan }}

                                    </span>

                                </td>


                                {{-- Deskripsi --}}
                                <td>

                                    <span class="text-muted">

                                        {{ Str::limit($ekskul->deskripsi, 80) }}

                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.ekskul.show', $ekskul->id_ekskul) }}"
                                           class="btn btn-light border"
                                           title="Detail">

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.ekskul.edit', $ekskul->id_ekskul) }}"
                                           class="btn btn-warning"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.ekskul.destroy', $ekskul->id_ekskul) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data ekskul ini?')">

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

                                        <i class="ti ti-school fs-1 text-muted"></i>

                                        <h5 class="mt-3">
                                            Belum Ada Data Ekskul
                                        </h5>

                                        <p class="text-muted mb-3">

                                            Silakan tambahkan data
                                            ekstrakurikuler terlebih dahulu.

                                        </p>

                                        <a href="{{ route('admin.ekskul.create') }}"
                                           class="btn btn-primary">

                                            <i class="ti ti-plus me-1"></i>

                                            Tambah Ekskul

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


{{-- Search Javascript --}}
<script>

    const searchInput = document.getElementById('searchEkskul');

    searchInput.addEventListener('input', function () {

        const search = this.value.toLowerCase();

        const rows = document.querySelectorAll('.ekskul-item');

        rows.forEach(function (row) {

            const nama = row.dataset.nama;
            const pembina = row.dataset.pembina;

            if (
                nama.includes(search) ||
                pembina.includes(search)
            ) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>

@endsection

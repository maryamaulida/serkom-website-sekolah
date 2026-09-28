@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">Prestasi Sekolah</h4>

            <p class="text-muted mb-0">
                Daftar prestasi yang telah diraih oleh sekolah
            </p>
        </div>

        <a href="{{ route('admin.prestasi.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Prestasi

        </a>

    </div>


    {{-- Alert sukses --}}
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


    {{-- Search --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        Cari Prestasi
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="ti ti-search"></i>
                        </span>

                        <input type="text"
                               id="searchPrestasi"
                               class="form-control"
                               placeholder="Cari nama prestasi...">

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Tabel Prestasi --}}
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
                                Foto
                            </th>

                            <th>
                                Nama Prestasi
                            </th>

                            <th>
                                Tahun Ajaran
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="180" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="prestasiTable">

                        @forelse($prestasis as $prestasi)

                            <tr class="prestasi-item">

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Foto --}}
                                <td>

                                    @if($prestasi->foto)

                                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                             alt="{{ $prestasi->nama_prestasi }}"
                                             width="70"
                                             height="50"
                                             style="object-fit: cover; border-radius: 8px;">

                                    @else

                                        <div class="d-flex align-items-center justify-content-center"
                                             style="
                                                width: 70px;
                                                height: 50px;
                                                background: #f5f7fa;
                                                border-radius: 8px;
                                             ">

                                            <i class="ti ti-trophy text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- Nama Prestasi --}}
                                <td>

                                    <span class="fw-semibold prestasi-nama">

                                        {{ $prestasi->nama_prestasi }}

                                    </span>

                                </td>


                                {{-- Tahun Ajaran --}}
                                <td>

                                    <span class="badge bg-light-primary text-primary">

                                        {{ $prestasi->tahun_ajaran }}

                                    </span>

                                </td>


                                {{-- Deskripsi --}}
                                <td>

                                    <span class="text-muted">

                                        {{ Str::limit($prestasi->deskripsi, 80) }}

                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Detail --}}
                                        <a href="{{ route('admin.prestasi.show', $prestasi->id) }}"
                                           class="btn btn-light"
                                           title="Detail">

                                            <i class="ti ti-eye"></i>

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                                           class="btn btn-warning"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">

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

                            <tr>

                                <td colspan="6">

                                    <div class="text-center py-5">

                                        <i class="ti ti-trophy fs-1 text-muted"></i>

                                        <h5 class="fw-bold mt-3">
                                            Belum Ada Prestasi
                                        </h5>

                                        <p class="text-muted mb-3">
                                            Belum ada data prestasi sekolah yang ditambahkan.
                                        </p>

                                        <a href="{{ route('admin.prestasi.create') }}"
                                           class="btn btn-primary">

                                            <i class="ti ti-plus me-1"></i>

                                            Tambah Prestasi

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

@endsection


@push('scripts')

<script>

document.getElementById('searchPrestasi').addEventListener('keyup', function () {

    let keyword = this.value.toLowerCase();

    document.querySelectorAll('.prestasi-item').forEach(function (item) {

        let nama = item.querySelector('.prestasi-nama')
                         .textContent
                         .toLowerCase();

        if (nama.includes(keyword)) {

            item.style.display = '';

        } else {

            item.style.display = 'none';

        }

    });

});

</script>

@endpush

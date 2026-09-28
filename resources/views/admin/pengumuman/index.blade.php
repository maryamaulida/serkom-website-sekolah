@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Data Pengumuman
            </h4>

            <p class="text-muted mb-0">
                Kelola pengumuman sekolah
            </p>
        </div>

        <a href="{{ route('admin.pengumuman.create') }}"
            class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Tambah Pengumuman

        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
            role="alert">

            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Card --}}
    <div class="card">

        <div class="card-body">

            {{-- Search & Filter --}}
            <div class="row mb-4">

                <div class="col-md-6">

                    <label class="form-label">
                        Cari Pengumuman
                    </label>

                    <input type="text"
                        id="searchPengumuman"
                        class="form-control"
                        placeholder="Cari judul pengumuman...">

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Filter Status
                    </label>

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


            {{-- Table --}}
            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Pembuat
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengumumans as $pengumuman)

                            <tr class="pengumuman-row"
                                data-judul="{{ strtolower($pengumuman->judul) }}"
                                data-status="{{ $pengumuman->status }}">

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <h6 class="mb-1 fw-semibold">
                                        {{ $pengumuman->judul }}
                                    </h6>

                                    <small class="text-muted">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($pengumuman->isi), 70) }}
                                    </small>

                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $pengumuman->user->name ?? '-' }}
                                </td>

                                <td>

                                    @if($pengumuman->status == 'Publish')

                                        <span class="badge bg-success">
                                            Publish
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="dropdown">

                                        <button class="btn btn-sm btn-light"
                                            type="button"
                                            data-bs-toggle="dropdown">

                                            <i class="ti ti-dots-vertical"></i>

                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.pengumuman.show', $pengumuman->id_pengumuman) }}">

                                                    <i class="ti ti-eye me-2"></i>
                                                    Detail

                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.pengumuman.edit', $pengumuman->id_pengumuman) }}">

                                                    <i class="ti ti-edit me-2"></i>
                                                    Edit

                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>

                                                <form action="{{ route('admin.pengumuman.destroy', $pengumuman->id_pengumuman) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="dropdown-item text-danger">

                                                        <i class="ti ti-trash me-2"></i>
                                                        Hapus

                                                    </button>

                                                </form>

                                            </li>

                                        </ul>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="ti ti-bell"
                                        style="font-size: 50px; color: #adb5bd;">
                                    </i>

                                    <h6 class="fw-semibold mt-3">
                                        Belum Ada Pengumuman
                                    </h6>

                                    <p class="text-muted">
                                        Belum ada data pengumuman sekolah.
                                    </p>

                                    <a href="{{ route('admin.pengumuman.create') }}"
                                        class="btn btn-primary">

                                        <i class="ti ti-plus me-1"></i>
                                        Tambah Pengumuman

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

    const searchInput = document.getElementById('searchPengumuman');
    const filterStatus = document.getElementById('filterStatus');
    const rows = document.querySelectorAll('.pengumuman-row');

    function filterPengumuman() {

        const search = searchInput.value.toLowerCase();
        const status = filterStatus.value;

        rows.forEach(row => {

            const judul = row.dataset.judul;
            const rowStatus = row.dataset.status;

            const matchSearch =
                judul.includes(search);

            const matchStatus =
                status === '' ||
                rowStatus === status;

            row.style.display =
                matchSearch && matchStatus
                    ? ''
                    : 'none';

        });

    }

    searchInput.addEventListener(
        'input',
        filterPengumuman
    );

    filterStatus.addEventListener(
        'change',
        filterPengumuman
    );

</script>

@endsection

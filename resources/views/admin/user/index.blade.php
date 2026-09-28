@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Data User
            </h4>

            <p class="text-muted mb-0">
                Kelola akun Admin dan Operator
            </p>
        </div>

        <a href="{{ route('admin.user.create') }}"
            class="btn btn-primary">
            <i class="ti ti-plus me-1"></i>
            Tambah User
        </a>

    </div>


    {{-- Alert Success --}}
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

            {{-- Search --}}
            <div class="row mb-4">

                <div class="col-md-6">

                    <label class="form-label">
                        Cari User
                    </label>

                    <input type="text"
                        id="searchUser"
                        class="form-control"
                        placeholder="Cari nama atau username...">

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Filter Role
                    </label>

                    <select id="filterRole"
                        class="form-select">

                        <option value="">
                            Semua Role
                        </option>

                        <option value="Admin">
                            Admin
                        </option>

                        <option value="Operator">
                            Operator
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
                                Nama
                            </th>

                            <th>
                                Username
                            </th>

                            <th>
                                Role
                            </th>

                            <th width="100">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody id="userTable">

                        @forelse($users as $user)

                            <tr class="user-row"
                                data-name="{{ strtolower($user->name) }}"
                                data-username="{{ strtolower($user->username) }}"
                                data-role="{{ $user->role }}">

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="rounded-circle bg-light-primary
                                                    d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">

                                            <i class="ti ti-user fs-5 text-primary"></i>

                                        </div>

                                        <div>
                                            <h6 class="mb-0 fw-semibold">
                                                {{ $user->name }}
                                            </h6>

                                            {{-- <small class="text-muted">
                                                {{ $user->id_user }}
                                            </small> --}}
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    {{ $user->username }}
                                </td>

                                <td>

                                    @if($user->role == 'Admin')

                                        <span class="badge bg-primary">
                                            Admin
                                        </span>

                                    @else

                                        <span class="badge bg-success">
                                            Operator
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

                                            {{-- Detail --}}
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.user.show', $user->id_user) }}">

                                                    <i class="ti ti-eye me-2"></i>
                                                    Detail

                                                </a>
                                            </li>

                                            {{-- Edit --}}
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.user.edit', $user->id_user) }}">

                                                    <i class="ti ti-edit me-2"></i>
                                                    Edit

                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            {{-- Hapus --}}
                                            <li>

                                                <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">

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
                                <td colspan="5"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="ti ti-users-group"
                                            style="font-size: 50px; color: #adb5bd;">
                                        </i>

                                    </div>

                                    <h6 class="fw-semibold">
                                        Belum Ada User
                                    </h6>

                                    <p class="text-muted mb-3">
                                        Belum ada akun Admin atau Operator.
                                    </p>

                                    <a href="{{ route('admin.user.create') }}"
                                        class="btn btn-primary">

                                        <i class="ti ti-plus me-1"></i>
                                        Tambah User

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


{{-- Search & Filter --}}
<script>

    const searchInput = document.getElementById('searchUser');
    const filterRole = document.getElementById('filterRole');
    const rows = document.querySelectorAll('.user-row');

    function filterUser() {

        const search = searchInput.value.toLowerCase();
        const role = filterRole.value;

        rows.forEach(row => {

            const name = row.dataset.name;
            const username = row.dataset.username;
            const userRole = row.dataset.role;

            const matchSearch =
                name.includes(search) ||
                username.includes(search);

            const matchRole =
                role === '' ||
                userRole === role;

            if (matchSearch && matchRole) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }

    searchInput.addEventListener('input', filterUser);
    filterRole.addEventListener('change', filterUser);

</script>

@endsection

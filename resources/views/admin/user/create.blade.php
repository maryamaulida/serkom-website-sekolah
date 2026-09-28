<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah User - SMK YPC Tasikmalaya</title>

    <link rel="shortcut icon" type="image/png"
        href="{{ asset('assets/images/logos/favicon.png') }}" />

    <link rel="stylesheet"
        href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>

    <div class="page-wrapper" id="main-wrapper">

        <div class="body-wrapper">

            <div class="container-fluid">

                <div class="card">

                    <div class="card-body">

                        <h5 class="card-title fw-semibold mb-2">
                            Tambah User
                        </h5>

                        <p class="card-subtitle mb-4 text-muted">
                            Tambahkan akun pengguna baru
                        </p>

                        <form action="{{ route('admin.user.store') }}" method="POST">

                            @csrf

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama
                                </label>

                                <input type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama"
                                    required>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Username
                                </label>

                                <input type="text"
                                    name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username"
                                    required>

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password"
                                    required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Role --}}
                            <div class="mb-4">
                                <label class="form-label">
                                    Role
                                </label>

                                <select name="role"
                                    class="form-select @error('role') is-invalid @enderror"
                                    required>

                                    <option value="">-- Pilih Role --</option>

                                    <option value="Admin"
                                        {{ old('role') == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="Operator"
                                        {{ old('role') == 'Operator' ? 'selected' : '' }}>
                                        Operator
                                    </option>

                                </select>

                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex gap-2">

                                <a href="{{ route('admin.user.index') }}"
                                    class="btn btn-light">
                                    Kembali
                                </a>

                                <button type="submit"
                                    class="btn btn-primary">
                                    Simpan User
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>

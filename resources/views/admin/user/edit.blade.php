<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User - SMK YPC Tasikmalaya</title>

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
                            Edit User
                        </h5>

                        <p class="card-subtitle mb-4 text-muted">
                            Ubah informasi akun pengguna
                        </p>

                        <form action="{{ route('admin.user.update', $user->id_user) }}"
                            method="POST">

                            @csrf
                            @method('PUT')

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama
                                </label>

                                <input type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}"
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
                                    value="{{ old('username', $user->username) }}"
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
                                    Password Baru
                                </label>

                                <input type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Kosongkan jika tidak ingin mengubah password">

                                <small class="text-muted">
                                    Kosongkan jika password tidak ingin diubah.
                                </small>

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

                                    <option value="Admin"
                                        {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="Operator"
                                        {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
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
                                    Update User
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

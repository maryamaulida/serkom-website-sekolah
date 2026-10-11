<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Siswa</title>

    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        body {
            background: #f5f7fb;
        }

        .form-card {
            max-width: 850px;
            margin: 40px auto;
        }

        .form-card .card {
            border: none;
            border-radius: 12px;
        }

        .form-label {
            font-weight: 500;
        }

        .required {
            color: #dc3545;
        }

        .foto-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="form-card">

            {{-- Header --}}
            <div class="mb-4">

                <a href="{{ route('admin.siswa.index') }}"
                   class="text-muted text-decoration-none">
                    <i class="ti ti-arrow-left me-1"></i>
                    Kembali ke Data Siswa
                </a>

                <div class="mt-3">
                    <h4 class="fw-semibold mb-1">
                        Edit Siswa
                    </h4>

                    <p class="text-muted mb-0">
                        Perbarui data siswa
                    </p>
                </div>

            </div>


            {{-- Form --}}
            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')


                        {{-- Nama --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Nama Siswa
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $siswa->nama) }}"
                                   placeholder="Masukkan nama siswa">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- NISN --}}
                        <div class="mb-3">

                            <label class="form-label">
                                NISN
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   name="nisn"
                                   class="form-control @error('nisn') is-invalid @enderror"
                                   value="{{ old('nisn', $siswa->nisn) }}"
                                   placeholder="Masukkan NISN">

                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="row">

                            {{-- Tahun Masuk --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Tahun Masuk
                                    <span class="required">*</span>
                                </label>

                                <input type="number"
                                       name="tahun_masuk"
                                       class="form-control @error('tahun_masuk') is-invalid @enderror"
                                       value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                                       placeholder="Contoh: 2025">

                                @error('tahun_masuk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Jenis Kelamin --}}
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Jenis Kelamin
                                    <span class="required">*</span>
                                </label>

                                <select name="jenis_kelamin"
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror">

                                    <option value="" disabled>
                                        Pilih jenis kelamin
                                    </option>

                                    <option value="Laki-Laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki
                                    </option>

                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- Foto Lama --}}
                        @if ($siswa->foto)

                            <div class="mb-3">

                                <label class="form-label d-block">
                                    Foto Saat Ini
                                </label>

                                <img src="{{ asset('storage/' . $siswa->foto) }}"
                                     alt="Foto {{ $siswa->nama }}"
                                     class="foto-preview">

                            </div>

                        @endif


                        {{-- Foto Baru --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Ganti Foto
                            </label>

                            <input type="file"
                                   name="foto"
                                   class="form-control @error('foto') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto.
                                Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                            </small>

                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Button --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('admin.siswa.index') }}"
                               class="btn btn-light border">
                                Batal
                            </a>

                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>

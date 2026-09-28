<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Tambah Galeri - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet"
        href="{{ asset('assets/css/styles.min.css') }}">

</head>

<body>

<div class="page-wrapper">

    <div class="body-wrapper">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title fw-semibold mb-2">
                        Tambah Galeri
                    </h5>

                    <p class="text-muted mb-4">
                        Tambahkan foto atau video dokumentasi sekolah.
                    </p>


                    <form action="{{ route('admin.galeri.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        {{-- Judul --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Judul
                            </label>

                            <input type="text"
                                name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}"
                                placeholder="Masukkan judul galeri"
                                required>

                            @error('judul')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Keterangan --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Keterangan
                            </label>

                            <textarea name="keterangan"
                                rows="5"
                                class="form-control @error('keterangan') is-invalid @enderror"
                                placeholder="Masukkan keterangan galeri..."
                                required>{{ old('keterangan') }}</textarea>

                            @error('keterangan')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Kategori --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select name="kategori"
                                id="kategori"
                                class="form-select @error('kategori') is-invalid @enderror"
                                required>

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                <option value="Foto"
                                    {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>

                            </select>

                            @error('kategori')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- File --}}
                        <div class="mb-3">

                            <label class="form-label">
                                File
                            </label>

                            <input type="file"
                                name="file"
                                class="form-control @error('file') is-invalid @enderror"
                                required>

                            <small class="text-muted">
                                Foto: JPG, JPEG, PNG, WEBP.
                                Video: MP4, MOV, AVI, MKV.
                                Maksimal 20 MB.
                            </small>

                            @error('file')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Tanggal --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Tanggal
                            </label>

                            <input type="date"
                                name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                required>

                            @error('tanggal')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Tombol --}}
                        <div class="d-flex gap-2">

                            <a href="{{ route('admin.galeri.index') }}"
                                class="btn btn-light">

                                Kembali

                            </a>

                            <button type="submit"
                                class="btn btn-primary">

                                Simpan Galeri

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

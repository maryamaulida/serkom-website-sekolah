<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Edit Galeri - SMK YPC Tasikmalaya</title>

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
                        Edit Galeri
                    </h5>

                    <p class="text-muted mb-4">
                        Ubah informasi galeri sekolah.
                    </p>


                    <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')


                        {{-- Judul --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Judul
                            </label>

                            <input type="text"
                                name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $galeri->judul) }}"
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
                                required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

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
                                class="form-select @error('kategori') is-invalid @enderror"
                                required>

                                <option value="Foto"
                                    {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>

                            </select>

                            @error('kategori')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- File Lama --}}
                        <div class="mb-3">

                            <label class="form-label">
                                File Saat Ini
                            </label>

                            @if($galeri->kategori == 'Foto')

                                <div class="mb-3">

                                    <img src="{{ asset('storage/' . $galeri->file) }}"
                                        style="width: 220px; height: 150px; object-fit: cover;"
                                        class="rounded">

                                </div>

                            @else

                                <div class="mb-3">

                                    <video controls
                                        style="width: 300px; max-height: 180px;">

                                        <source src="{{ asset('storage/' . $galeri->file) }}">

                                    </video>

                                </div>

                            @endif

                        </div>


                        {{-- File Baru --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Ganti File
                            </label>

                            <input type="file"
                                name="file"
                                class="form-control @error('file') is-invalid @enderror">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti file.
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
                                value="{{ old('tanggal', $galeri->tanggal) }}"
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

                                Update Galeri

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

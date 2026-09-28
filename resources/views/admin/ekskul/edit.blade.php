<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Ekskul</title>

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

        .current-image {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-card">

        {{-- Header --}}
        <div class="mb-4">

            <a href="{{ route('admin.ekskul.index') }}"
               class="text-muted text-decoration-none">
                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Data Ekskul
            </a>

            <div class="mt-3">

                <h4 class="fw-semibold mb-1">
                    Edit Ekstrakurikuler
                </h4>

                <p class="text-muted mb-0">
                    Ubah data ekstrakurikuler
                </p>

            </div>

        </div>


        {{-- Form --}}
        <div class="card shadow-sm">

            <div class="card-body p-4">

                <form action="{{ route('admin.ekskul.update', $ekskul->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    {{-- Nama Ekskul --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Nama Ekskul
                            <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="nama_eskul"
                               class="form-control @error('nama_eskul') is-invalid @enderror"
                               value="{{ old('nama_eskul', $ekskul->nama_eskul) }}"
                               placeholder="Contoh: Pramuka">

                        @error('nama_eskul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Nama Pembina --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Nama Pembina
                            <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="nama_pembina"
                               class="form-control @error('nama_pembina') is-invalid @enderror"
                               value="{{ old('nama_pembina', $ekskul->nama_pembina) }}"
                               placeholder="Masukkan nama pembina">

                        @error('nama_pembina')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Jadwal Latihan --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Jadwal Latihan
                            <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="jadwal_latihan"
                               class="form-control @error('jadwal_latihan') is-invalid @enderror"
                               value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}"
                               placeholder="Contoh: Jumat, 14.00 - 16.00">

                        @error('jadwal_latihan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Deskripsi --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                            <span class="required">*</span>
                        </label>

                        <textarea name="deskripsi"
                                  rows="5"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Gambar Lama --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <div>
                            @if ($ekskul->gambar)

                                <img src="{{ asset('storage/' . $ekskul->gambar) }}"
                                     class="current-image"
                                     alt="{{ $ekskul->nama_eskul }}">

                            @else

                                <p class="text-muted mb-0">
                                    Belum ada gambar.
                                </p>

                            @endif
                        </div>

                    </div>


                    {{-- Gambar Baru --}}
                    <div class="mb-4">

                        <label class="form-label">
                            Ganti Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Button --}}
                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.ekskul.index') }}"
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

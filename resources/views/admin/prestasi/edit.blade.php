<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Prestasi - SMK YPC Tasikmalaya</title>

    <link rel="shortcut icon" type="image/png"
        href="{{ asset('assets/images/logos/favicon.png') }}" />

    <link rel="stylesheet"
        href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">

        <div class="card border-0 shadow-sm"
             style="width: 100%; max-width: 850px;">

            <div class="card-body p-4 p-md-5">

                {{-- Header --}}
                <div class="mb-4">

                    <a href="{{ route('admin.prestasi.index') }}"
                       class="text-decoration-none text-muted">

                        <i class="ti ti-arrow-left me-1"></i>
                        Kembali ke Prestasi

                    </a>

                    <h4 class="fw-bold mt-3 mb-1">
                        Edit Prestasi
                    </h4>

                    <p class="text-muted mb-0">
                        Perbarui data prestasi sekolah
                    </p>

                </div>

                {{-- Error --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <strong>Data belum bisa disimpan.</strong>

                        <ul class="mb-0 mt-2">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('admin.prestasi.update', $prestasi->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Nama Prestasi --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nama Prestasi
                        </label>

                        <input type="text"
                               name="nama_prestasi"
                               class="form-control"
                               value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
                               required>

                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                    </div>

                    {{-- Tahun Ajaran --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Tahun Ajaran
                        </label>

                        <input type="number"
                               name="tahun_ajaran"
                               class="form-control"
                               value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}"
                               min="2000"
                               max="2100"
                               required>

                    </div>

                    {{-- Foto Lama --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Foto Saat Ini
                        </label>

                        <div>
                            <img src="{{ asset('storage/' . $prestasi->foto) }}"
                                 alt="{{ $prestasi->nama_prestasi }}"
                                 style="width: 220px;
                                        height: 140px;
                                        object-fit: cover;
                                        border-radius: 10px;">
                        </div>

                    </div>

                    {{-- Foto Baru --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Ganti Foto
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                            Maksimal 2 MB.
                        </small>

                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.prestasi.index') }}"
                           class="btn btn-light">

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

</body>

</html>

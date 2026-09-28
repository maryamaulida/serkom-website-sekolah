<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Guru - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        body {
            background: #f5f7fb;
        }

        .form-card {
            max-width: 900px;
            margin: 50px auto;
        }

        .upload-box {
            border: 2px dashed #d9dee8;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            background: #fafbfc;
        }

        .upload-box i {
            font-size: 42px;
            color: #5d87ff;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-card">

        <div class="mb-4">
            <a href="{{ route('admin.guru.index') }}" class="text-decoration-none text-muted">
                <i class="ti ti-arrow-left me-1"></i>
                Kembali
            </a>

            <h3 class="fw-semibold mt-3 mb-1">
                Tambah Guru
            </h3>

            <p class="text-muted mb-0">
                Tambahkan data guru dan tenaga kependidikan.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data yang diisi.</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.guru.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Nama Guru
                            </label>

                            <input type="text"
                                   name="nama_guru"
                                   class="form-control"
                                   value="{{ old('nama_guru') }}"
                                   placeholder="Masukkan nama guru"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                NIP
                            </label>

                            <input type="text"
                                   name="nip"
                                   class="form-control"
                                   value="{{ old('nip') }}"
                                   placeholder="Masukkan NIP">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Mata Pelajaran
                            </label>

                            <input type="text"
                                   name="mapel"
                                   class="form-control"
                                   value="{{ old('mapel') }}"
                                   placeholder="Contoh: Matematika"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Jabatan
                            </label>

                            <select name="jabatan" class="form-select" required>
                                <option value="" selected disabled>
                                    Pilih jabatan
                                </option>

                                <option value="Guru Mapel"
                                    {{ old('jabatan') == 'Guru Mapel' ? 'selected' : '' }}>
                                    Guru Mapel
                                </option>

                                <option value="Guru Produktif"
                                    {{ old('jabatan') == 'Guru Produktif' ? 'selected' : '' }}>
                                    Guru Produktif
                                </option>

                                <option value="Tenaga Kependidikan"
                                    {{ old('jabatan') == 'Tenaga Kependidikan' ? 'selected' : '' }}>
                                    Tenaga Kependidikan
                                </option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Foto Guru
                            </label>

                            <div class="upload-box">
                                <i class="ti ti-photo"></i>

                                <h6 class="fw-semibold mt-3 mb-1">
                                    Upload Foto Guru
                                </h6>

                                <p class="text-muted small mb-3">
                                    JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                                </p>

                                <input type="file"
                                       name="foto"
                                       class="form-control"
                                       accept="image/png,image/jpeg,image/webp">
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                        <a href="{{ route('admin.guru.index') }}"
                           class="btn btn-light border">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i>
                            Simpan Guru
                        </button>

                    </div>

                </div>
            </div>

        </form>

    </div>

</div>

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>

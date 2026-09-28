<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perbarui Guru - SMK YPC Tasikmalaya</title>

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

        {{-- Header --}}
        <div class="mb-4">
            <a href="{{ route('admin.guru.index') }}" class="text-decoration-none text-muted">
                <i class="ti ti-arrow-left me-1"></i>
                Kembali
            </a>

            <h3 class="fw-semibold mt-3 mb-1">
                Perbarui Guru
            </h3>

            <p class="text-muted mb-0">
                Perbarui data guru dan tenaga kependidikan.
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

        {{-- Form --}}

        <form action="{{ route('admin.guru.update', $guru->id) }}"
        method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <div class="row g-4">

                    {{-- Nama Guru --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nama Guru
                        </label>

                        <input type="text"
                                name="nama_guru"
                                class="form-control"
                                value="{{ old('nama_guru', $guru->nama_guru) }}"
                                placeholder="Masukkan nama guru">
                    </div>


                    {{-- NIP --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            NIP
                        </label>

                        <input type="text"
                               class="form-control"
                               name="nip"
                               value="{{ old('nip', $guru->nip) }}"
                               placeholder="Masukkan NIP">
                    </div>


                    {{-- Mata Pelajaran --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               class="form-control"
                               name="mapel"
                               value="{{ old('mapel', $guru->mapel) }}"
                               placeholder="Contoh: Matematika">

                    </div>


                    {{-- Jabatan --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Jabatan
                        </label>

                        <select name="jabatan" class="form-select">
                            <option value="" selected disabled>
                                Pilih jabatan
                            </option>

                            <option value="Guru Mapel"
                                {{ old('jabatan',  $guru->jabatan) == 'Guru Mapel' ? 'selected' : '' }}>
                                Guru Mapel
                            </option>

                            <option value="Guru Produktif"
                                {{ old('jabatan',  $guru->jabatan) == 'Guru Produktif' ? 'selected' : ''}}>
                                Guru Produktif
                            </option>

                            <option value="Tenaga Kependidikan"
                                {{ old('jabatan',  $guru->jabatan) == 'Tenaga Kependidikan' ? 'selected' : '' }}>
                                Tenaga Kependidikan
                            </option>

                            @error('jabatan')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </select>
                    </div>


                    {{-- Foto --}}
                    <div class="col-12">
                    <label class="form-label fw-semibold">
                        Foto Guru
                    </label>

                    <div class="upload-box">

                        @if ($guru->foto)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                    alt="Foto {{ $guru->nama_guru }}"
                                    width="150"
                                    height="150"
                                    class="rounded-circle"
                                    style="object-fit: cover;">
                            </div>
                        @endif

                        <i class="ti ti-photo"></i>

                        <h6 class="fw-semibold mt-3 mb-1">
                            Ganti Foto Guru
                        </h6>

                        <p class="text-muted small mb-3">
                            Pilih foto baru jika ingin mengganti foto lama.
                            <br>
                            JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                        </p>

                        <input type="file"
                            name="foto"
                            class="form-control"
                            value="{{ old('foto', $guru->foto) }}"
                            accept="image/png,image/jpeg,image/webp">
                    </div>
                </div>

                </div>


                {{-- Button --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a href="{{ route('admin.guru.index') }}"
                       class="btn btn-light border">
                        Batal
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
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

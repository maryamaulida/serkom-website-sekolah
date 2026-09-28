<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Berita</title>

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

        .form-check-input {
            width: 42px;
            height: 22px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-card">

        {{-- Header --}}
        <div class="mb-4">

            <a href="{{ route('admin.berita.index') }}"
               class="text-muted text-decoration-none">

                <i class="ti ti-arrow-left me-1"></i>
                Kembali ke Data Berita

            </a>

            <div class="mt-3">

                <h4 class="fw-semibold mb-1">
                    Edit Berita
                </h4>

                <p class="text-muted mb-0">
                    Ubah informasi berita sekolah
                </p>

            </div>

        </div>


        {{-- Form --}}
        <div class="card shadow-sm">

            <div class="card-body p-4">

                <form action="{{ route('admin.berita.update', ['berita' => $berita->id_berita]) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- ID User --}}
                    <input type="hidden"
                           name="id_user"
                           value="{{ $berita->id_user }}">


                    {{-- Judul --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Judul Berita

                            <span class="required">*</span>

                        </label>

                        <input type="text"
                               name="judul"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul', $berita->judul) }}"
                               placeholder="Masukkan judul berita">

                        @error('judul')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Tanggal --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Tanggal

                            <span class="required">*</span>

                        </label>

                        <input type="date"
                               name="tanggal"
                               class="form-control @error('tanggal') is-invalid @enderror"
                               value="{{ old('tanggal', $berita->tanggal) }}">

                        @error('tanggal')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Isi --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Isi Berita

                            <span class="required">*</span>

                        </label>

                        <textarea name="isi"
                                  rows="8"
                                  class="form-control @error('isi') is-invalid @enderror"
                                  placeholder="Tulis isi berita di sini...">{{ old('isi', $berita->isi) }}</textarea>

                        @error('isi')

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

                            @if ($berita->gambar)

                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                     class="current-image"
                                     alt="{{ $berita->judul }}">

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


                    {{-- Status --}}
                    <div class="mb-4">

                        <label class="form-label d-block">
                            Status Berita
                        </label>

                        <div class="form-check form-switch">

                            {{-- Nilai status yang sebenarnya dikirim --}}
                            <input type="hidden"
                                   name="status"
                                   id="statusValue"
                                   value="{{ old('status', $berita->status) }}">

                            {{-- Switch --}}
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="status"
                                   {{ old('status', $berita->status) == 'Publish' ? 'checked' : '' }}>

                            <label class="form-check-label ms-2"
                                   for="status">

                                <span id="statusText">

                                    {{ old('status', $berita->status) == 'Publish' ? 'Publish' : 'Draft' }}

                                </span>

                            </label>

                        </div>

                        <small class="text-muted">

                            Aktifkan switch jika berita ingin ditampilkan di website.

                        </small>

                        @error('status')

                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Button --}}
                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.berita.index') }}"
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


<script>

    const status = document.getElementById('status');
    const statusValue = document.getElementById('statusValue');
    const statusText = document.getElementById('statusText');

    function updateStatus() {

        if (status.checked) {

            statusValue.value = 'Publish';
            statusText.textContent = 'Publish';

        } else {

            statusValue.value = 'Draft';
            statusText.textContent = 'Draft';

        }

    }

    updateStatus();

    status.addEventListener('change', updateStatus);

</script>

</body>

</html>

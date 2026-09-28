<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Edit Pengumuman - SMK YPC Tasikmalaya</title>

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
                        Edit Pengumuman
                    </h5>

                    <p class="text-muted mb-4">
                        Ubah informasi pengumuman.
                    </p>


                    <form action="{{ route('admin.pengumuman.update', $pengumuman->id_pengumuman) }}"
                        method="POST">

                        @csrf
                        @method('PUT')


                        {{-- Judul --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Judul Pengumuman
                            </label>

                            <input type="text"
                                name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $pengumuman->judul) }}"
                                required>

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
                            </label>

                            <input type="date"
                                name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror"
                                value="{{ old('tanggal', $pengumuman->tanggal) }}"
                                required>

                            @error('tanggal')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Isi --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Isi Pengumuman
                            </label>

                            <textarea name="isi"
                                rows="7"
                                class="form-control @error('isi') is-invalid @enderror"
                                required>{{ old('isi', $pengumuman->isi) }}</textarea>

                            @error('isi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Status --}}
                        <div class="mb-4">

                            <div class="form-check form-switch">

                                <input class="form-check-input"
                                    type="checkbox"
                                    name="status"
                                    id="status"
                                    value="Publish"
                                    {{ old('status', $pengumuman->status) == 'Publish' ? 'checked' : '' }}>

                                <label class="form-check-label"
                                    for="status">

                                    Publish Pengumuman

                                </label>

                            </div>

                            <small class="text-muted">
                                Matikan switch jika pengumuman ingin dijadikan draft.
                            </small>

                        </div>


                        {{-- Tombol --}}
                        <div class="d-flex gap-2">

                            <a href="{{ route('admin.pengumuman.index') }}"
                                class="btn btn-light">

                                Kembali

                            </a>

                            <button type="submit"
                                class="btn btn-primary">

                                Update Pengumuman

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

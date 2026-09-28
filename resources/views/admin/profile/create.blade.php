@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-semibold mb-1">Tambah Profile Sekolah</h4>
            <p class="text-muted mb-0">
                Tambahkan informasi lengkap mengenai sekolah
            </p>
        </div>

        <a href="{{ route('admin.profile.index') }}" class="btn btn-light">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.profile.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            {{-- Informasi Sekolah --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 bg-light-primary p-2 me-3">
                                <i class="ti ti-school text-primary fs-5"></i>
                            </div>

                            <div>
                                <h5 class="fw-semibold mb-1">
                                    Informasi Sekolah
                                </h5>

                                <small class="text-muted">
                                    Masukkan identitas sekolah
                                </small>
                            </div>
                        </div>

                        {{-- Nama Sekolah --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nama Sekolah
                            </label>

                            <input type="text"
                                   name="nama_sekolah"
                                   class="form-control"
                                   value="{{ old('nama_sekolah') }}"
                                   placeholder="Masukkan nama sekolah"
                                   required>

                            @error('nama_sekolah')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- Kepala Sekolah --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Kepala Sekolah
                            </label>

                            <input type="text"
                                   name="kepala_sekolah"
                                   class="form-control"
                                   value="{{ old('kepala_sekolah') }}"
                                   placeholder="Masukkan nama kepala sekolah"
                                   required>

                            @error('kepala_sekolah')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- NPSM & Tahun Berdiri --}}
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    NPSM
                                </label>

                                <input type="text"
                                       name="npsm"
                                       class="form-control"
                                       value="{{ old('npsm') }}"
                                       placeholder="Masukkan NPSM"
                                       required>

                                @error('npsm')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Tahun Berdiri
                                </label>

                                <input type="number"
                                       name="tahun_berdiri"
                                       class="form-control"
                                       value="{{ old('tahun_berdiri') }}"
                                       placeholder="Contoh: 2005"
                                       required>

                                @error('tahun_berdiri')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat sekolah"
                                      required>{{ old('alamat') }}</textarea>

                            @error('alamat')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 bg-light-primary p-2 me-3">
                                <i class="ti ti-target text-primary fs-5"></i>
                            </div>

                            <div>
                                <h5 class="fw-semibold mb-1">
                                    Visi & Misi
                                </h5>

                                <small class="text-muted">
                                    Masukkan visi dan misi sekolah
                                </small>
                            </div>
                        </div>

                        {{-- Visi --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Visi Sekolah
                            </label>

                            <textarea name="visi"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Masukkan visi sekolah"
                                      required>{{ old('visi') }}</textarea>

                            @error('visi')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- Misi --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Misi Sekolah
                            </label>

                            <textarea name="misi"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Masukkan misi sekolah"
                                      required>{{ old('misi') }}</textarea>

                            @error('misi')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-3 bg-light-primary p-2 me-3">
                                <i class="ti ti-file-description text-primary fs-5"></i>
                            </div>

                            <div>
                                <h5 class="fw-semibold mb-1">
                                    Deskripsi Sekolah
                                </h5>

                                <small class="text-muted">
                                    Ceritakan informasi singkat mengenai sekolah
                                </small>
                            </div>
                        </div>

                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Masukkan deskripsi sekolah"
                                  required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>
                </div>

            </div>

            {{-- Foto & Logo --}}
            <div class="col-lg-4">

                {{-- Foto Sekolah --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <h5 class="fw-semibold mb-1">
                            Foto Sekolah
                        </h5>

                        <p class="text-muted small mb-3">
                            Upload foto sekolah
                        </p>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/png,image/jpeg,image/webp"
                               required>

                        <small class="text-muted d-block mt-2">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                        @error('foto')
                            <small class="text-danger d-block mt-2">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>
                </div>

                {{-- Logo Sekolah --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">

                        <h5 class="fw-semibold mb-1">
                            Logo Sekolah
                        </h5>

                        <p class="text-muted small mb-3">
                            Upload logo sekolah
                        </p>

                        <input type="file"
                               name="logo"
                               class="form-control"
                               accept="image/png,image/jpeg,image/webp"
                               required>

                        <small class="text-muted d-block mt-2">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>

                        @error('logo')
                            <small class="text-danger d-block mt-2">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>
                </div>

                {{-- Tombol --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <button type="submit"
                                class="btn btn-primary w-100 mb-2">
                            <i class="ti ti-device-floppy me-1"></i>
                            Simpan Profile
                        </button>

                        <a href="{{ route('admin.profile.index') }}"
                           class="btn btn-light w-100">
                            Batal
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection

@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-semibold mb-1">
                Detail User
            </h4>

            <p class="text-muted mb-0">
                Informasi detail akun pengguna
            </p>
        </div>

        <a href="{{ route('admin.user.index') }}"
            class="btn btn-light">
            Kembali
        </a>

    </div>


    {{-- Detail User --}}
    <div class="card">

        <div class="card-body">

            <div class="row">

                {{-- Nama --}}
                <div class="col-md-6 mb-4">

                    <small class="text-muted d-block mb-1">
                        Nama
                    </small>

                    <h6 class="fw-semibold mb-0">
                        {{ $user->name }}
                    </h6>

                </div>


                {{-- Username --}}
                <div class="col-md-6 mb-4">

                    <small class="text-muted d-block mb-1">
                        Username
                    </small>

                    <h6 class="fw-semibold mb-0">
                        {{ $user->username }}
                    </h6>

                </div>


                {{-- Role --}}
                <div class="col-md-6 mb-4">

                    <small class="text-muted d-block mb-1">
                        Role
                    </small>

                    @if($user->role == 'Admin')

                        <span class="badge bg-primary">
                            Admin
                        </span>

                    @else

                        <span class="badge bg-success">
                            Operator
                        </span>

                    @endif

                </div>


                {{-- Dibuat --}}
                <div class="col-md-6 mb-4">

                    <small class="text-muted d-block mb-1">
                        Dibuat
                    </small>

                    <h6 class="fw-semibold mb-0">
                        {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                    </h6>

                </div>


                {{-- Diupdate --}}
                <div class="col-md-6">

                    <small class="text-muted d-block mb-1">
                        Terakhir Diubah
                    </small>

                    <h6 class="fw-semibold mb-0">
                        {{ $user->updated_at ? $user->updated_at->format('d M Y, H:i') : '-' }}
                    </h6>

                </div>

            </div>


            {{-- Tombol --}}
            <div class="border-top pt-4 mt-4">

                <a href="{{ route('admin.user.edit', $user->id_user) }}"
                    class="btn btn-primary">
                    Edit User
                </a>

                <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger">
                        Hapus User
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

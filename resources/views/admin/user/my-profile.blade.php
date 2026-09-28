    @extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h4 class="fw-semibold mb-1">
            My Profile
        </h4>

        <p class="text-muted mb-0">
            Informasi akun yang sedang digunakan
        </p>

    </div>


    {{-- Profile Card --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

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

                    @if($user->role === 'Admin')

                        <span class="badge bg-primary">
                            Admin
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Operator
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

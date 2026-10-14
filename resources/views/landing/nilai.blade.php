@extends('layouts.landing-template')
@section('content')
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h3 class="text-center mb-4">Form Nilai Siswa</h3>

        <form action="{{ route('nilai.hitung') }}" method="POST">
            @csrf   

            <div class="mb-3">
                <label class="form-label">Nilai 1</label>
                <input type="number" name="nilai1" class="form-control"
                    min="0" max="100" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai 2</label>
                <input type="number" name="nilai2" class="form-control"
                    min="0" max="100" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nilai 3</label>
                <input type="number" name="nilai3" class="form-control"
                    min="0" max="100" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Hitung Rata-rata
            </button>
        </form>

        @isset($rataNilai)
            <hr>

            <h5>Rata-rata: {{ $rataNilai }}</h5>

            @if ($rataNilai >= 75)
                <div class="alert alert-success">
                    Selamat, kamu LULUS!
                </div>
            @else
                <div class="alert alert-danger">
                    Maaf, kamu TIDAK LULUS.
                </div>
            @endif
        @endisset
    </div>
</div>
@endsection

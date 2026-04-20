@extends('layouts.app')

@section('content')

<style>
    .card-hover {
        transition: 0.3s;
    }

    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    a.card-link {
        text-decoration: none;
    }
</style>

<h3 class="mb-3">📚 Dashboard</h3>
<p class="text-muted">Selamat datang di sistem E-Perpus</p>

<!-- CARD -->
<div class="row mb-4">

    <!-- BUKU (BISA DIKLIK) -->
    <div class="col-md-3">
        <a href="{{ route('daftarbukuterbaru') }}" class="card-link">
            <div class="card bg-success text-white border card-hover" style="cursor:pointer;">
                <div class="card-body">
                    <h4>{{ $totalBuku ?? 0 }}</h4>
                    <p>📘 Buku</p>
                </div>
            </div>
        </a>
    </div>

    <!-- PEMINJAMAN -->
    <div class="col-md-3">
        <div class="card bg-warning text-white border">
            <div class="card-body">
                <h4>{{ $totalPinjam ?? 0 }}</h4>
                <p>📊 Peminjaman</p>
            </div>
        </div>
    </div>

    <!-- PENGEMBALIAN -->
    <div class="col-md-3">
        <div class="card bg-danger text-white border">
            <div class="card-body">
                <h4>{{ $totalKembali ?? 0 }}</h4>
                <p>🔄 Pengembalian</p>
            </div>
        </div>
    </div>

</div>

@endsection
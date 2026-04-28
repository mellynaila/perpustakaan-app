@extends('layouts.app')

@section('content')
    <h3 class="mb-4 fw-bold">📊 Dashboard Perpustakaan</h3>

    <div class="row g-4">

        <!-- Anggota -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-primary text-white p-4">
                <small>Total Anggota</small>
                <h1 class="fw-bold mt-2">{{ $totalAnggota }}</h1>
            </div>
        </div>

        <!-- Buku -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-success text-white p-4">
                <small>Total Buku</small>
                <h1 class="fw-bold mt-2">{{ $totalBuku }}</h1>
            </div>
        </div>

        <!-- Peminjaman -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 bg-warning p-4">
                <small>Total Peminjaman</small>
                <h1 class="fw-bold mt-2">{{ $totalPeminjaman }}</h1>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-dashboard {
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            font-size: 30px;
            opacity: 0.8;
        }

        .card-blue {
            background: linear-gradient(45deg, #4e73df, #224abe);
        }

        .card-green {
            background: linear-gradient(45deg, #1cc88a, #13855c);
        }

        .card-yellow {
            background: linear-gradient(45deg, #f6c23e, #dda20a);
        }

        .nav-btn {
            border-radius: 10px;
            padding: 10px 20px;
            margin-right: 10px;
        }
    </style>

    <div class="container mt-4">

        <h3 class="mb-4 fw-bold">📊 Dashboard Perpustakaan</h3>

        <div class="row">

            <div class="col-md-4">
                <div class="card-dashboard card-blue d-flex justify-content-between">
                    <div>
                        <h6>Total Anggota</h6>
                        <h2>{{ $totalAnggota }}</h2>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-dashboard card-green d-flex justify-content-between">
                    <div>
                        <h6>Total Buku</h6>
                        <h2>{{ $totalBuku }}</h2>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-book-fill"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-dashboard card-yellow d-flex justify-content-between">
                    <div>
                        <h6>Total Peminjaman</h6>
                        <h2>{{ $totalPeminjaman }}</h2>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-arrow-left-right"></i>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <div class="mb-3">
            <a href="/anggota" class="btn btn-primary nav-btn">Data Anggota</a>
            <a href="/buku" class="btn btn-success nav-btn">Data Buku</a>
            <a href="/peminjaman" class="btn btn-warning nav-btn">Peminjaman</a>
        </div>

    </div>
@endsection

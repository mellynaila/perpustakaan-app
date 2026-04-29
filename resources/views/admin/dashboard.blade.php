@extends('layouts.app')

@section('content')
    <div class="content-area">

        <h3 class="mb-4">📊 Dashboard Perpustakaan Czennie 127</h3>

        <div class="row g-4">

            <!-- ANGGOTA -->
            <div class="col-md-4">
                <div class="card-modern blue">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="small mb-1">Total Anggota</p>
                            <h1>{{ $totalAnggota }}</h1>
                        </div>
                        <div class="icon-box">👥</div>
                    </div>
                </div>
            </div>

            <!-- BUKU -->
            <div class="col-md-4">
                <div class="card-modern green">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="small mb-1">Total Buku</p>
                            <h1>{{ $totalBuku }}</h1>
                        </div>
                        <div class="icon-box">📚</div>
                    </div>
                </div>
            </div>

            <!-- PEMINJAMAN -->
            <div class="col-md-4">
                <div class="card-modern yellow">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="small mb-1">Total Peminjaman</p>
                            <h1>{{ $totalPeminjaman }}</h1>
                        </div>
                        <div class="icon-box">🔄</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

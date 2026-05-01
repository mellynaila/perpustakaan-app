@extends('layouts.app')

@section('content')
    <style>
        .card-stat {
            border: none;
            border-radius: 20px;
            padding: 25px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bg-blue {
            background: linear-gradient(135deg, #36a2eb, #00c6ff);
        }

        .bg-green {
            background: linear-gradient(135deg, #2ecc71, #55efc4);
        }

        .bg-orange {
            background: linear-gradient(135deg, #f39c12, #f1c40f);
        }

        .icon-box {
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 12px;
        }

        .title {
            font-size: 14px;
        }

        .value {
            font-size: 32px;
            font-weight: bold;
        }
    </style>

    <h3 class="mb-4">📊 Dashboard Anggota</h3>

    <div class="row g-4">

        {{-- TOTAL BUKU --}}
        <div class="col-md-4">
            <div class="card-stat bg-green">
                <div>
                    <div class="title">Total Buku</div>
                    <div class="value">{{ $totalBuku }}</div>
                </div>
                <div class="icon-box">
                    <img src="{{ asset('images/book.png') }}" width="40">
                </div>
            </div>
        </div>

        {{-- STATUS --}}
        <div class="col-md-4">
            <div class="card-stat bg-orange">
                <div>
                    <div class="title">Status</div>
                    <div class="value">Aktif</div>
                </div>
                <div class="icon-box"><img src="{{ asset('images/reload2.png') }}" alt="Peminjaman" width="50"
                        height="45"></div>
            </div>
        </div>

    </div>
@endsection

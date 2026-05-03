<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan 시즈니</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 220px;
            background: #0f172a;
            color: white;
            min-height: 100vh;
        }

        .btn-white {
            background: white;
            border: 1px solid #ccc;
        }

        .card-modern {
            border-radius: 16px;
            padding: 20px;
            color: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card-modern:hover {
            transform: translateY(-5px);
        }

        .card-modern.blue {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .card-modern.green {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }

        .card-modern.yellow {
            background: linear-gradient(135deg, #f7971e, #ffd200);
        }
    </style>
</head>

<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar p-3">
            <h4 class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logonct.png') }}" style="height:60px;">
                Perpus NctZen
            </h4>

            <hr style="border-color:#39ff14;">

            @if (auth()->user()->role == 'admin')
                @include('layouts.sidebar-admin')
            @else
                @include('layouts.sidebar-anggota')
            @endif
        </div>

        <!-- CONTENT -->
        <div class="flex-grow-1">

            {{-- NAVBAR DIPANGGIL DI SINI --}}
            @include('layouts.navbar')

            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>

</body>

</html>

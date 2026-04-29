<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .navbar-neon {
            background: #ffffff;
            border-bottom: 2px solid #39ff14;
        }

        .btn-white {
            background: white;
            border: 1px solid #ccc;
        }

        /* DASHBOARD CARD */
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

        .icon-box {
            font-size: 28px;
            background: rgba(255, 255, 255, 0.25);
            padding: 12px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar p-3">
            <h4>📚 Perpus</h4>
            <hr style="border-color:#39ff14;">

            {{-- pilih sidebar sesuai role --}}
            @if (auth()->user()->role == 'admin')
                @include('layouts.sidebar-admin')
            @else
                @include('layouts.sidebar-anggota')
            @endif
        </div>

        <!-- CONTENT -->
        <div class="flex-grow-1">

            <!-- NAVBAR -->
            <nav class="navbar navbar-neon px-3 d-flex justify-content-between">
                <span class="navbar-brand">📚 Sistem Perpustakaan Czennie 127</span>

                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold text-dark">
                        Halo, {{ auth()->user()->name }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-white btn-sm">🔓 Logout</button>
                    </form>
                </div>
            </nav>

            <!-- ISI HALAMAN -->
            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>

</body>

</html>

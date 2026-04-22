<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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

        .content-box {
            background: white;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h3 class="mb-4 fw-bold">📊 Dashboard Perpustakaan</h3>

        <div class="row">

            <!-- Anggota -->
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

            <!-- Buku -->
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

            <!-- Peminjaman -->
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

        <!-- Menu -->
        <div class="mb-3">
            <a href="/pengguna" class="btn btn-primary nav-btn">Data Anggota</a>
            <a href="/buku" class="btn btn-success nav-btn">Data Buku</a>
            <a href="/peminjaman" class="btn btn-warning nav-btn">Peminjaman</a>
        </div>

        <!-- Content -->
        <div class="content-box">
            <h5 class="mb-2">Belum ada data</h5>
            <p class="text-muted">Silakan pilih menu di atas untuk mulai mengelola data.</p>

            <a href="/pengguna/create" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>

    </div>

</body>

</html>

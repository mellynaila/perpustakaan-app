<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            background: #1f2d3d;
            color: white;
        }

        .sidebar h4 {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #34495e;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #34495e;
        }

        /* Content */
        .content {
            margin-left: 230px;
            padding: 20px;
        }

        /* Card */
        .card-box {
            border-radius: 12px;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-box i {
            font-size: 30px;
            float: right;
            opacity: 0.5;
        }

        .bg-blue {
            background: #3498db;
        }

        .bg-orange {
            background: #f39c12;
        }

        .bg-green {
            background: #27ae60;
        }

        .bg-red {
            background: #e74c3c;
        }

        .bg-purple {
            background: #8e44ad;
        }

        .bg-dark {
            background: #2c3e50;
        }

        .bg-pink {
            background: #e84393;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="fa fa-book"></i> E-Library</h4>

        <a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a>
        <a href="/buku"><i class="fa fa-book"></i> Data Buku</a>
        <a href="/kategori"><i class="fa fa-list"></i> Kategori</a>
        <a href="/peminjaman"><i class="fa fa-exchange-alt"></i> Peminjaman</a>
        <a href="/pengguna"><i class="fa fa-users"></i> Pengguna</a>
        <a href="/logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h3 class="mb-4">Dashboard Administrator</h3>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card-box bg-blue">
                    <h6>Total Buku</h6>
                    <h3>{{ $totalBuku }}</h3>
                    <i class="fa fa-book"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-box bg-orange">
                    <h6>Total Pengguna</h6>
                    <h3>{{ $totalPengguna }}</h3>
                    <i class="fa fa-users"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-box bg-green">
                    <h6>Buku Dipinjam</h6>
                    <h3>{{ $bukuDipinjam }}</h3>
                    <i class="fa fa-book-open"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-box bg-red">
                    <h6>Dikembalikan</h6>
                    <h3>{{ $bukuDikembalikan }}</h3>
                    <i class="fa fa-undo"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-box bg-purple">
                    <h6>Kategori</h6>
                    <h3>{{ $totalKategori }}</h3>
                    <i class="fa fa-list"></i>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
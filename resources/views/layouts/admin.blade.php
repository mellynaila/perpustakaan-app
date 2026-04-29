<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font (biar lebih modern) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f3, #ffffff);
            font-family: 'Poppins', sans-serif;
        }

        .content-area {
            padding: 30px;
        }

        /* HEADER */
        .page-title {
            font-weight: 600;
            color: #1e293b;
        }

        /* CARD MODERN */
        .card-modern {
            border-radius: 18px;
            padding: 22px;
            color: #fff;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-modern::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            top: -30px;
            right: -30px;
        }

        .card-modern:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
        }

        /* WARNA */
        .blue {
            background: linear-gradient(135deg, #4facfe, #00c6ff);
        }

        .green {
            background: linear-gradient(135deg, #43e97b, #00c9a7);
        }

        .yellow {
            background: linear-gradient(135deg, #f7971e, #ffcc33);
        }

        /* ICON */
        .icon-box {
            font-size: 32px;
            background: rgba(255, 255, 255, 0.25);
            padding: 14px;
            border-radius: 14px;
            backdrop-filter: blur(5px);
        }

        /* CARD TEXT */
        .card-modern p {
            opacity: 0.9;
            font-size: 14px;
        }

        .card-modern h1 {
            font-size: 32px;
            margin: 0;
        }

        /* TABLE */
        .card {
            border-radius: 14px;
            border: none;
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container-fluid content-area">
        @yield('content')
    </div>

</body>

</html>

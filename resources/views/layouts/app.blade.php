<!DOCTYPE html>
<html>

<head>
    <title>E-Perpus</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url("{{ asset('images/bgperpus.jpeg') }}") no-repeat center center/cover;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: white;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            min-height: 100vh;
        }

        table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="p-4 w-100 main-content">
            @yield('content')
        </div>
    </div>

</body>

</html>
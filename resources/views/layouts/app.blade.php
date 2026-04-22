<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .active-menu {
            background: #0d6efd;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            @include('layouts.sidebar')

            <div class="col-md-10">

                @include('layouts.navbar')

                <div class="content">
                    @yield('content')
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

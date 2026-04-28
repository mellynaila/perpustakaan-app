<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.01);
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow-lg border-0">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">✏️ Edit Status Peminjaman</h5>
                    </div>

                    <div class="card-body p-4">

                        <!-- FORM -->
                        <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- STATUS -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Status Peminjaman</label>
                                <select name="status" class="form-select">
                                    <option value="Dipinjam" {{ $peminjaman->status == 'Dipinjam' ? 'selected' : '' }}>
                                        Dipinjam
                                    </option>

                                    <option value="Dikembalikan"
                                        {{ $peminjaman->status == 'Dikembalikan' ? 'selected' : '' }}>
                                        Dikembalikan
                                    </option>
                                </select>
                            </div>

                            <!-- BUTTON -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="/peminjaman" class="btn btn-secondary">
                                    ← Kembali
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>

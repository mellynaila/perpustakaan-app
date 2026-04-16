<!DOCTYPE html>
<html>

<head>
    <title>Manajemen Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('images/bgperpus.jpg') }}") no-repeat center;
            background-size: cover;
            z-index: -1;
        }

        .card {
            border-radius: 20px;
        }

        table {
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <!-- FORM -->
        <div class="card p-4 mb-4 shadow">
            <h4>{{ isset($edit) ? 'Edit Buku' : 'Tambah Buku' }}</h4>

            <form action="{{ isset($edit) ? route('buku.update', $edit->id_buku) : route('buku.store') }}" method="POST">
                @csrf
                @if(isset($edit))
                @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="judul" class="form-control"
                            placeholder="Judul"
                            value="{{ $edit->judul ?? '' }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="text" name="penulis" class="form-control"
                            placeholder="Penulis"
                            value="{{ $edit->penulis ?? '' }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="text" name="penerbit" class="form-control"
                            placeholder="Penerbit"
                            value="{{ $edit->penerbit ?? '' }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="number" name="tahun_terbit" class="form-control"
                            placeholder="Tahun"
                            value="{{ $edit->tahun_terbit ?? '' }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <input type="number" name="stok" class="form-control"
                            placeholder="Stok"
                            value="{{ $edit->stok ?? '' }}" required>
                    </div>
                </div>

                <button class="btn btn-success">
                    {{ isset($edit) ? 'Update' : 'Simpan' }}
                </button>

                @if(isset($edit))
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
                @endif
            </form>
        </div>

        <!-- TABEL -->
        <div class="card p-4 shadow">
            <h4>📚 Daftar Buku</h4>

            <table class="table table-bordered text-center mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>

                            <!-- EDIT -->
                            <a href="{{ route('buku.edit', $item->id_buku) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('buku.destroy', $item->id_buku) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Data kosong</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>
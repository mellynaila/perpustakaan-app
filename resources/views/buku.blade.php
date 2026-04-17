<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url("{{ asset('images/bgperpus.jpeg') }}") no-repeat center center/cover;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h3 class="text-center mb-4">📚 Data Buku</h3>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Buku
        </button>

        <!-- TABLE -->
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id_buku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEdit{{ $item->id_buku }}">
                            Edit
                        </button>

                        <!-- Hapus -->
                        <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- MODAL EDIT -->
                <div class="modal fade" id="modalEdit{{ $item->id_buku }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('buku.update', $item->id_buku) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="text" name="judul" class="form-control mb-2" value="{{ $item->judul }}">
                                    <input type="text" name="penulis" class="form-control mb-2" value="{{ $item->penulis }}">
                                    <input type="text" name="penerbit" class="form-control mb-2" value="{{ $item->penerbit }}">
                                    <input type="number" name="tahun_terbit" class="form-control mb-2" value="{{ $item->tahun_terbit }}">
                                    <input type="number" name="stok" class="form-control mb-2" value="{{ $item->stok }}">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>

    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" name="judul" class="form-control mb-2" placeholder="Judul">
                        <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis">
                        <input type="text" name="penerbit" class="form-control mb-2" placeholder="Penerbit">
                        <input type="number" name="tahun_terbit" class="form-control mb-2" placeholder="Tahun">
                        <input type="number" name="stok" class="form-control mb-2" placeholder="Stok">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
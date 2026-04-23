@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h3 class="mb-3">📚 Data Buku</h3>

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Buku
        </button>

        <!-- Tabel -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($buku as $item)
                    <tr>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->thn_terbit }}</td>
                        <td>{{ $item->jml_buku }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'Tersedia' ? 'success' : 'danger' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>

                            <!-- EDIT -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $item->id_buku }}">
                                Edit
                            </button>

                            <!-- DELETE -->
                            <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="edit{{ $item->id_buku }}">
                        <div class="modal-dialog">
                            <form action="{{ route('buku.update', $item->id_buku) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <input type="text" name="judul_buku" value="{{ $item->judul_buku }}"
                                            class="form-control mb-2" required>

                                        <input type="text" name="pengarang" value="{{ $item->pengarang }}"
                                            class="form-control mb-2" required>

                                        <input type="text" name="penerbit" value="{{ $item->penerbit }}"
                                            class="form-control mb-2" required>

                                        <input type="number" name="thn_terbit" value="{{ $item->thn_terbit }}"
                                            class="form-control mb-2" required>

                                        <input type="number" name="jml_buku" value="{{ $item->jml_buku }}"
                                            class="form-control mb-2" required>

                                        <input type="text" name="kategori" value="{{ $item->kategori }}"
                                            class="form-control mb-2" required>

                                        <select name="status" class="form-control mb-2" required>
                                            <option value="Tersedia" {{ $item->status == 'Tersedia' ? 'selected' : '' }}>
                                                Tersedia</option>
                                            <option value="Dipinjam" {{ $item->status == 'Dipinjam' ? 'selected' : '' }}>
                                                Dipinjam</option>
                                        </select>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Update</button>
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
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="text" name="judul_buku" class="form-control mb-2" placeholder="Judul_Buku" required>

                        <input type="text" name="pengarang" class="form-control mb-2" placeholder="Pengarang" required>

                        <input type="text" name="penerbit" class="form-control mb-2" placeholder="Penerbit" required>

                        <input type="number" name="thn_terbit" class="form-control mb-2" placeholder="Tahun_Terbit"
                            required>

                        <input type="number" name="jml_terbit" class="form-control mb-2" placeholder="Jumlah Buku"
                            required>

                        <input type="text" name="kategori" class="form-control mb-2" placeholder="Kategori" required>

                        <select name="status" class="form-control mb-2" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

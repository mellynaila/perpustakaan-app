@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')

    <style>
        .card-custom {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 15px;
            color: white;
        }
    </style>

    <h3 class="mb-3">📖 Data Peminjaman</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-custom">

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Peminjaman
        </button>

        <!-- TABLE -->
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nm_peminjam }}</td>
                        <td>{{ $item->buku->judul_buku ?? '-' }}</td>
                        <td>{{ $item->tgl_pinjam }}</td>
                        <td>{{ $item->tgl_kembali }}</td>
                        <td>

                            <!-- Edit -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $item->kd_pinjam }}">
                                Edit
                            </button>

                            <!-- Hapus -->
                            <form action="{{ route('peminjaman.destroy', $item->kd_pinjam) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="edit{{ $item->kd_pinjam }}">
                        <div class="modal-dialog">
                            <form action="{{ route('peminjaman.update', $item->kd_pinjam) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                        <h5>Edit Peminjaman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <input type="text" name="nm_peminjam" class="form-control mb-2"
                                            value="{{ $item->nm_peminjam }}">

                                        <select name="id_buku" class="form-control mb-2">
                                            @foreach ($buku as $b)
                                                <option value="{{ $b->id_buku }}"
                                                    {{ $item->id_buku == $b->id_buku ? 'selected' : '' }}>
                                                    {{ $b->judul_buku }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <input type="date" name="tgl_pinjam" class="form-control mb-2"
                                            value="{{ $item->tgl_pinjam }}">

                                        <input type="date" name="tgl_kembali" class="form-control mb-2"
                                            value="{{ $item->tgl_kembali }}">
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
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf

                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h5>Tambah Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <input type="text" name="nm_peminjam" class="form-control mb-2" placeholder="Nama Peminjam">

                        <select name="id_buku" class="form-control mb-2">
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($buku as $b)
                                <option value="{{ $b->id_buku }}">
                                    {{ $b->judul_buku }}
                                </option>
                            @endforeach
                        </select>

                        <input type="date" name="tgl_pinjam" class="form-control mb-2">
                        <input type="date" name="tgl_kembali" class="form-control mb-2">

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

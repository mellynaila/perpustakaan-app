@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h3 class="mb-3">📖 Data Peminjaman</h3>

        <!-- ALERT -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- BUTTON -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Peminjaman
        </button>

        <!-- TABLE -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->buku->judul_buku ?? '-' }}</td>
                        <td>{{ $item->tgl_pinjam }}</td>
                        <td>

                            <!-- EDIT -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $item->id }}">
                                Edit
                            </button>

                            <!-- DELETE -->
                            <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST"
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
                    <div class="modal fade" id="edit{{ $item->id }}">
                        <div class="modal-dialog">
                            <form action="{{ route('peminjaman.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Peminjaman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <!-- FIX VALUE -->
                                        <input type="text" name="nama_peminjam" value="{{ $item->nama_peminjam }}"
                                            class="form-control mb-2" required>

                                        <select name="id_buku" class="form-control mb-2" required>
                                            @foreach ($buku as $b)
                                                <option value="{{ $b->id_buku }}"
                                                    {{ $item->id_buku == $b->id_buku ? 'selected' : '' }}>
                                                    {{ $b->judul_buku }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <input type="date" name="tgl_pinjam" value="{{ $item->tgl_pinjam }}"
                                            class="form-control mb-2" required>

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

                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Tambah Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- FIX NAME -->
                        <input type="text" name="nama_peminjam" class="form-control mb-2" placeholder="Nama Peminjam"
                            required>

                        <select name="id_buku" class="form-control mb-2" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($buku as $b)
                                <option value="{{ $b->id_buku }}" {{ $b->jml_buku == 0 ? 'disabled' : '' }}>
                                    {{ $b->judul_buku }} (Stok: {{ $b->jml_buku }})
                                </option>
                            @endforeach
                        </select>

                        <input type="date" name="tgl_pinjam" class="form-control mb-2" required>

                        <!-- HAPUS tgl_kembali ❌ -->

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

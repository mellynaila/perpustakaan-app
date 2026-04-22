@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h3>📚 Data Buku</h3>

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Buku
        </button>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Aksi</th>
            </tr>

            @foreach ($buku as $item)
                <tr>
                    <td>{{ $item->id_buku }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>

                        <!-- EDIT -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $item->id_buku }}">
                            Edit
                        </button>

                        <!-- DELETE -->
                        <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
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
                                </div>

                                <div class="modal-body">
                                    <input type="text" name="judul_buku" value="{{ $item->judul_buku }}"
                                        class="form-control mb-2">
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            @endforeach

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
                    </div>

                    <div class="modal-body">
                        <input type="text" name="judul_buku" class="form-control mb-2">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h3>Data Buku</h3>

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">
        Tambah Buku
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun_terbit</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach ($buku as $item)
            <tr>
                <td>{{ $item->id_buku }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->jml_buku }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

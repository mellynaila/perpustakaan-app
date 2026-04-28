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
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun_terbit</th>
            <th>Jumlah</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $buku)
            <tr>
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul_buku }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->jml_buku }}</td>
                <td>{{ $buku->kategori }}</td>
                <td>{{ $buku->status }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

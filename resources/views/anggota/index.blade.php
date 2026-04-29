@extends('layouts.anggota')

@section('content')
    <h3>📚 Daftar Buku</h3>

    <table class="table">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach ($buku as $b)
            <tr>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    <form action="/pinjam/{{ $b->id }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">Pinjam</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection

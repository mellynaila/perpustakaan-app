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

        @foreach ($anggota as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->penulis }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <form action="/pinjam/{{ $anggota->id_anggota }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">Pinjam</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection

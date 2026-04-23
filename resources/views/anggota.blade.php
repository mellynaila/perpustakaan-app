@extends('layouts.app')

@section('content')
    <h3>Data Anggota</h3>

    <form action="/anggota/tambah" method="POST" class="d-flex gap-2 mb-3">
        @csrf
        <input type="text" name="nama" class="form-control" placeholder="Nama">
        <input type="text" name="nim" class="form-control" placeholder="NIM">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
        <input type="date" name="tgl_lahir" class="form-control">
        <button class="btn btn-primary">Tambah</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id_anggota }}</td>
                <td>{{ $item->nama_anggota }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->tgl_lahir }}</td>
                <td>
                    <a href="/anggota/edit/{{ $item->id_anggota }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/anggota/hapus/{{ $item->id_anggota }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

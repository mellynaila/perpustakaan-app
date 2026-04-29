@extends('layouts.app')

@section('content')

<h3>👥 Data Anggota</h3>

<a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama_anggota }}</td>
            <td>{{ $a->nim }}</td>
            <td>{{ $a->alamat }}</td>
            <td>{{ $a->tgl_lahir }}</td>
            <td>
                <a href="{{ route('anggota.edit', $a->id_anggota) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('anggota.destroy', $a->id_anggota) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@extends('layouts.app')

@section('content')
    <h3>Daftar Anggota</h3>

    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">
        + Tambah Anggota
    </a>

    <table class="table table-bordered">
        <tr>
            <th>Nama Anggota</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>

        @foreach ($anggota as $item)
            <tr>
                <td>{{ $item->nama_anggota }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->tgl_lahir }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $item) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('anggota.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
@endsection

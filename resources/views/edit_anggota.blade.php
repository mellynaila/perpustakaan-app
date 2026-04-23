@extends('layouts.app')

@section('content')
    <h3>Edit Data Anggota</h3>

    <form action="/anggota/update/{{ $anggota->id_anggota }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $anggota->nama_anggota }}">
        </div>

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $anggota->nim }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $anggota->alamat }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ $anggota->tgl_lahir }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/anggota" class="btn btn-secondary">Kembali</a>

    </form>
@endsection

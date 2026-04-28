@extends('layouts.app')

@section('content')

<h3>Edit Anggota</h3>

<form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_anggota" value="{{ $anggota->nama_anggota }}" class="form-control mb-2">
    <input type="text" name="nim" value="{{ $anggota->nim }}" class="form-control mb-2">
    <input type="text" name="alamat" value="{{ $anggota->alamat }}" class="form-control mb-2">
    <input type="date" name="tgl_lahir" value="{{ $anggota->tgl_lahir }}" class="form-control mb-2">

    <button class="btn btn-primary">Update</button>
</form>

@endsection
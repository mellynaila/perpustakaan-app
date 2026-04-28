@extends('layouts.app')

@section('content')

<h3>Tambah Anggota</h3>

<form action="{{ route('anggota.store') }}" method="POST">
    @csrf

    <input type="text" name="nama_anggota" class="form-control mb-2" placeholder="Nama">
    <input type="text" name="nim" class="form-control mb-2" placeholder="NIM">
    <input type="text" name="alamat" class="form-control mb-2" placeholder="Alamat">
    <input type="date" name="tgl_lahir" class="form-control mb-2">

    <button class="btn btn-success">Simpan</button>
</form>

@endsection
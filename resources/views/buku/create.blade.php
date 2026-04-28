@extends('layouts.app')

@section('content')
    <h3>Tambah Buku</h3>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <input type="text" name="judul_buku" placeholder="Judul" class="form-control mb-2">

        <input type="text" name="pengarang" placeholder="Pengarang" class="form-control mb-2">

        <input type="text" name="penerbit" placeholder="Penerbit" class="form-control mb-2">

        <input type="text" name="tahun_terbit" placeholder="Tahun Terbit" class="form-control mb-2">

        <input type="number" name="jml_buku" placeholder="Jumlah" class="form-control mb-2">

        {{-- KATEGORI --}}
        <input type="text" name="kategori" placeholder="Kategori" class="form-control mb-2">

        <select name="status" class="form-control mb-2">
            <option value="Tersedia">Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
        </select>

        <button class="btn btn-success">Simpan</button>
    </form>
@endsection

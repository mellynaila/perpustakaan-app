@extends('layouts.app')

@section('content')
    <h3>Edit Buku</h3>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}" class="form-control mb-2"
            placeholder="Judul Buku">

        <input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="form-control mb-2"
            placeholder="Pengarang">

        <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control mb-2"
            placeholder="Penerbit">

        <input type="text" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="form-control mb-2"
            placeholder="Tahun Terbit">

        <input type="number" name="jml_buku" value="{{ $buku->jml_buku }}" class="form-control mb-2"
            placeholder="Jumlah Buku">

        {{-- KATEGORI --}}
        <input type="text" name="kategori" value="{{ $buku->kategori }}" class="form-control mb-2"
            placeholder="Kategori">

        <select name="status" class="form-control mb-2">
            <option value="Tersedia" {{ $buku->status == 'Tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>
            <option value="Dipinjam" {{ $buku->status == 'Dipinjam' ? 'selected' : '' }}>
                Dipinjam
            </option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection

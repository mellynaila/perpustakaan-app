@extends('layouts.app')

@section('content')
    <h3>Tambah Peminjaman</h3>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <label>Anggota</label>
        <select name="id_anggota" class="form-control">
            @foreach ($anggota as $a)
                <option value="{{ $a->id_anggota }}">
                    {{ $a->nama_anggota }}
                </option>
            @endforeach
        </select>

        <br>

        <label>Buku</label>
        <select name="id_buku" class="form-control">
            @foreach ($buku as $b)
                <option value="{{ $b->id }}">
                    {{ $b->judul_buku }} (stok: {{ $b->jml_buku }})
                </option>
            @endforeach
        </select>

        <br>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control">

        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control">

        <br>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>
@endsection

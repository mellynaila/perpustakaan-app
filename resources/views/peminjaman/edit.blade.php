@extends('layouts.app')

@section('content')
    <h3>Edit Peminjaman</h3>

    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Anggota</label>
            <select name="id_anggota" class="form-control">
                @foreach ($anggota as $a)
                    <option value="{{ $a->id }}" {{ $a->id == $peminjaman->id_anggota ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Buku</label>
            <select name="id_buku" class="form-control">
                @foreach ($buku as $b)
                    <option value="{{ $b->id }}" {{ $b->id == $peminjaman->id ? 'selected' : '' }}>
                        {{ $b->judul_buku }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}">
        </div>

        <div class="mb-2">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

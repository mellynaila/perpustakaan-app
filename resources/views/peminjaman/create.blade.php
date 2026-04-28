@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Peminjaman</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/peminjaman') }}" method="POST">
            @csrf

            <!-- ANGGOTA -->
            <div class="mb-3">
                <label>Anggota</label>
                <select name="id_anggota" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($anggota as $a)
                        <option value="{{ $a->id_anggota }}">
                            {{ $a->nama_anggota }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- BUKU -->
            <div class="mb-3">
                <label>Buku</label>
                <select name="id_buku" class="form-control">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->judul_buku }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL -->
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

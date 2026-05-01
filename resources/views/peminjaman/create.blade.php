@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Peminjaman</h3>

        <form action="{{ route('peminjaman.store') }}" method="POST">
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
                <select name="id_buku" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id_buku }}">
                            {{ $b->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL PINJAM -->
            <div class="mb-3">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <!-- DEADLINE -->
            <div class="mb-3">
                <label>Deadline</label>
                <input type="date" name="tanggal_kembali" class="form-control"
                    value="{{ date('Y-m-d', strtotime('+7 days')) }}" required>
            </div>

            <div class="alert alert-info">
                Denda Rp 1000 / hari jika terlambat
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Tambah Buku</h3>

        {{-- ALERT ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf

            <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Judul" class="form-control mb-2">

            <input type="text" name="penulis" value="{{ old('penulis') }}" placeholder="Penulis"
                class="form-control mb-2">

            <input type="text" name="penerbit" value="{{ old('penerbit') }}" placeholder="Penerbit"
                class="form-control mb-2">

            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}" placeholder="Tahun Terbit"
                class="form-control mb-2">

            <input type="number" name="jml_buku" value="{{ old('jml_buku') }}" placeholder="Jumlah Buku"
                class="form-control mb-2">

            {{-- KATEGORI --}}
            <input type="text" name="kategori" value="{{ old('kategori') }}" placeholder="Kategori"
                class="form-control mb-2">

            {{-- STATUS --}}
            <select name="status" class="form-control mb-3">
                <option value="">-- Pilih Status --</option>
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

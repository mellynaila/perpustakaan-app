@extends('layouts.app')

@section('content')
    <h3 class="mb-4">📚 Riwayat Peminjaman Saya</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>{{ $item->status }}</td>
                    <td>Rp {{ number_format($item->denda) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada peminjaman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

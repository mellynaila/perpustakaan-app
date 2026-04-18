@extends('layouts.app')

@section('content')

<h3 class="mb-3">📚 Dashboard</h3>
<p class="text-muted">Selamat datang di sistem E-Perpus</p>

<!-- CARD -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-success text-white border">
            <div class="card-body">
                <h4>{{ $totalBuku ?? 0 }}</h4>
                <p>Buku</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-white border">
            <div class="card-body">
                <h4>{{ $totalPinjam ?? 0 }}</h4>
                <p>Peminjaman</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-danger text-white border">
            <div class="card-body">
                <h4>{{ $totalKembali ?? 0 }}</h4>
                <p>Pengembalian</p>
            </div>
        </div>
    </div>

</div>

<!-- TABEL -->
<div class="card border">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead class="table-dark text-center">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th style="width: 120px;">Tahun</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($buku as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td class="text-center">{{ $item->tahun_terbit }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data buku
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
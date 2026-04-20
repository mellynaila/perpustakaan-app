@extends('layouts.app')

@section('content')

<h3 class="mb-3">📘 Daftar Buku Terbaru</h3>

<a href="/dashboard" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
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
@extends('layouts.app')

@section('content')
    <h3>Data Peminjaman</h3>

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">
        Tambah Peminjaman
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Denda</th>
                <th>Status</th>
                <th width="250">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($peminjaman as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $p->anggota->nama_anggota ?? '-' }}</td>
                    <td>{{ $p->buku->judul_buku ?? '-' }}</td>

                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali ?? '-' }}</td>

                    <td>
                        @if ($p->denda > 0)
                            <span class="text-danger fw-bold">
                                Rp {{ number_format($p->denda) }}
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        @if ($p->status == 'Dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @else
                            <span class="badge bg-success">Dikembalikan</span>
                        @endif
                    </td>

                    <td>
                        {{-- EDIT --}}
                        <a href="{{ route('peminjaman.edit', $p) }}" class="btn btn-warning btn-sm me-1">
                            Edit
                        </a>

                        {{-- KEMBALIKAN --}}
                        @if ($p->status == 'Dipinjam')
                            <form action="{{ route('peminjaman.update', $p) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="Dikembalikan">

                                <button type="submit" class="btn btn-success btn-sm me-1"
                                    onclick="return confirm('Kembalikan buku ini?')">
                                    Kembalikan
                                </button>
                            </form>
                        @endif

                        {{-- HAPUS --}}
                        <form action="{{ route('peminjaman.destroy', $p) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        Data peminjaman belum ada
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <h3>Data Peminjaman</h3>

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">
        Tambah Peminjaman
    </a>

    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Pinjam</th>
                <th>Deadline</th>
                <th>Dikembalikan</th>
                <th>Status</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($peminjaman as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    {{-- ANGGOTA --}}
                    <td class="text-start">
                        {{ $p->anggota->nama_anggota ?? '-' }}
                    </td>

                    {{-- BUKU --}}
                    <td class="text-start">
                        {{ $p->buku->judul_buku ?? '-' }}
                    </td>

                    {{-- TANGGAL --}}
                    <td>{{ date('d M Y', strtotime($p->tanggal_pinjam)) }}</td>
                    <td>{{ date('d M Y', strtotime($p->tanggal_kembali)) }}</td>
                    <td>
                        {{ $p->tgl_dikembalikan ? date('d M Y', strtotime($p->tgl_dikembalikan)) : '-' }}
                    </td>

                    {{-- STATUS --}}
                    <td>
                        @if ($p->status == 'Dikembalikan')
                            <span class="badge bg-success px-3">Dikembalikan</span>
                        @elseif($p->status == 'Dipinjam')
                            <span class="badge bg-warning text-dark px-3">Dipinjam</span>
                        @else
                            <span class="badge bg-secondary px-3">-</span>
                        @endif
                    </td>

                    {{-- DENDA --}}
                    <td>
                        @php
                            $denda = (int) $p->denda;
                        @endphp

                        @if ($denda > 0)
                            <span class="text-danger fw-bold">
                                Rp {{ number_format($denda, 0, ',', '.') }}
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <a href="{{ route('peminjaman.edit', $p->id) }}" class="btn btn-warning btn-sm mb-1">
                            Edit
                        </a>

                        @if ($p->status == 'Dipinjam')
                            <form action="{{ route('peminjaman.update', $p->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Dikembalikan">

                                <button class="btn btn-success btn-sm mb-1"
                                    onclick="return confirm('Kembalikan buku ini?')">
                                    Kembalikan
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">
                        Data peminjaman belum ada
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

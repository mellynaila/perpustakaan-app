@extends('layouts.app')

@section('content')
<h3>Data Peminjaman</h3>

<a href="{{ route('peminjaman.create') }}" class="btn btn-primary mb-3">
    Tambah Peminjaman
</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Anggota</th>
        <th>Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Denda</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach ($peminjaman as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->anggota->nama }}</td>
        <td>{{ $p->buku->judul_buku }}</td>
        <td>{{ $p->tanggal_pinjam }}</td>
        <td>{{ $p->tanggal_kembali }}</td>

        <td>
            @if ($p->denda > 0)
                <span class="text-danger">
                    Rp {{ number_format($p->denda) }}
                </span>
            @else
                -
            @endif
        </td>

        <td>
            @if ($p->status == 'Dipinjam')
                <span class="badge bg-warning">Dipinjam</span>
            @else
                <span class="badge bg-success">Dikembalikan</span>
            @endif
        </td>

        <td>

            {{-- tombol kembalikan --}}
            <form action="{{ route('peminjaman.update', $p->id) }}" method="POST" style="display:inline">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="Dikembalikan">

                <button class="btn btn-success btn-sm"
                    onclick="return confirm('Kembalikan buku ini?')">
                    Kembalikan
                </button>
            </form>

            {{-- hapus --}}
            <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data?')">
                    Hapus
                </button>
            </form>

        </td>
    </tr>
    @endforeach

</table>
@endsection
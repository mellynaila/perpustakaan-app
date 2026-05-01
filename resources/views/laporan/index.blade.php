@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-3">📚 Laporan Peminjaman Buku</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Terlambat</th>
                    <th>Denda</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tgl Dikembalikan</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @if ($data)
                    @php
                        $telat = 0;

                        if ($data->tanggal_kembali && $data->tanggal_dikembalikan) {
                            $telat = \Carbon\Carbon::parse($data->tanggal_kembali)->diffInDays(
                                $data->tanggal_dikembalikan,
                                false,
                            );
                        }
                    @endphp

                    <tr>
                        <td>1</td>

                        <td>{{ $data->anggota->nama_anggota ?? '-' }}</td>

                        <td>{{ $data->buku->judul ?? '-' }}</td>

                        <td>
                            {{ $telat > 0 ? $telat . ' hari' : 'Tidak terlambat' }}
                        </td>

                        <td>
                            {{ $telat > 0 ? 'Rp ' . number_format($telat * 1000, 0, ',', '.') : '-' }}
                        </td>

                        <td>{{ $data->tanggal_pinjam ?? '-' }}</td>

                        <td>{{ $data->tanggal_kembali ?? '-' }}</td>

                        <td>{{ $data->tanggal_dikembalikan ?? '-' }}</td>

                        <td>
                            <span class="badge bg-{{ $data->status == 'dikembalikan' ? 'success' : 'warning' }}">
                                {{ $data->status }}
                            </span>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>

    {{-- STYLE PRINT --}}
    <style>
        @media print {

            button {
                display: none;
            }

            body {
                font-size: 12px;
            }

            table {
                border-collapse: collapse;
            }

            .table-dark {
                background: #000 !important;
                color: #fff !important;
            }
        }
    </style>
@endsection

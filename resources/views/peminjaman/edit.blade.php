@extends('layouts.app')

@section('content')
    <h3>Edit Peminjaman</h3>

    <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ANGGOTA --}}
        <div class="mb-2">
            <label>Anggota</label>
            <select name="id_anggota" class="form-control">
                @foreach ($anggota as $a)
                    <option value="{{ $a->id_anggota }}" {{ $a->id_anggota == $peminjaman->id_anggota ? 'selected' : '' }}>
                        {{ $a->nama_anggota }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- BUKU --}}
        <div class="mb-2">
            <label>Buku</label>
            <select name="id_buku" class="form-control">
                @foreach ($buku as $b)
                    <option value="{{ $b->id_buku }}" {{ $b->id_buku == $peminjaman->id_buku ? 'selected' : '' }}>
                        {{ $b->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- TANGGAL PINJAM --}}
        <div class="mb-2">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}">
        </div>

        {{-- TANGGAL KEMBALI --}}
        <div class="mb-2">
            <label>Tanggal Kembali (Deadline)</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
                value="{{ $peminjaman->tanggal_kembali }}">
        </div>

        {{-- TANGGAL DIKEMBALIKAN --}}
        <div class="mb-2">
            <label>Tanggal Dikembalikan</label>
            <input type="date" name="tgl_dikembalikan" id="tgl_dikembalikan" class="form-control"
                value="{{ $peminjaman->tgl_dikembalikan }}">
        </div>

        {{-- PREVIEW DENDA --}}
        <div class="mb-2">
            <label>Estimasi Denda</label>
            <input type="text" id="preview_denda" class="form-control fw-bold text-danger" readonly>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
    </form>

    {{-- ================= SCRIPT ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const tglKembaliInput = document.getElementById('tanggal_kembali');
            const tglInput = document.getElementById('tgl_dikembalikan');
            const preview = document.getElementById('preview_denda');

            function hitungDenda() {

                if (!tglInput.value || !tglKembaliInput.value) {
                    preview.value = '-';
                    return;
                }

                let deadline = new Date(tglKembaliInput.value);
                let kembali = new Date(tglInput.value);

                if (kembali > deadline) {
                    let selisih = Math.floor((kembali - deadline) / (1000 * 60 * 60 * 24));
                    let denda = selisih * 1000;

                    preview.value = "Rp " + denda.toLocaleString('id-ID');
                } else {
                    preview.value = "Tidak ada denda";
                }
            }

            // realtime trigger
            tglInput.addEventListener('change', hitungDenda);
            tglKembaliInput.addEventListener('change', hitungDenda);

            // saat load langsung hitung
            hitungDenda();
        });
    </script>
@endsection

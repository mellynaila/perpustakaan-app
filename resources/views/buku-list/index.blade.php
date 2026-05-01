@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">📚 Data Buku</h3>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="row">
            @forelse ($buku as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title fw-bold">
                                {{ $item->judul ?? '-' }}
                            </h5>

                            <p class="mb-1">
                                <strong>Penulis:</strong> {{ $item->penulis ?? '-' }}
                            </p>

                            <p class="mb-1">
                                <strong>Penerbit:</strong> {{ $item->penerbit ?? '-' }}
                            </p>

                            <p class="mb-3">
                                <strong>Stok:</strong>
                                <span class="badge bg-{{ ($item->stok ?? 0) > 0 ? 'success' : 'danger' }}">
                                    {{ $item->stok ?? 0 }}
                                </span>
                            </p>

                            {{-- FORM PINJAM --}}
                            <form action="{{ route('peminjaman.store') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $item->id }}">

                                <button type="submit" class="btn btn-primary btn-sm w-100"
                                    {{ ($item->stok ?? 0) <= 0 ? 'disabled' : '' }}>

                                    {{ ($item->stok ?? 0) <= 0 ? 'Stok Habis' : '📖 Pinjam Buku' }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center">
                        Tidak ada data buku
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

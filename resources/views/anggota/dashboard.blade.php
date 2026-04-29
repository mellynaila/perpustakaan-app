@extends('layouts.app')

@section('content')
    <h3 class="mb-4">📊 Dashboard Anggota</h3>

    <div class="row g-4">

        {{-- LAPORAN DENDA --}}
        <div class="col-md-4">
            <div class="card card-dark shadow">
                <div class="card-body">
                    <h6>Laporan Denda Buku</h6>
                    <a href="/buku" class="btn btn-success btn-sm mt-2">
                        Buka
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection

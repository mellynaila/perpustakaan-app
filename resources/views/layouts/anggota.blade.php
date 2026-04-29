@extends('layouts.app')

@section('layout')
    <div class="d-flex">

        {{-- SIDEBAR --}}
        <div class="sidebar p-3">
            <h4>📚 Perpus</h4>
            <hr style="border-color:#39ff14;">

            {{-- ambil dari file terpisah --}}
            @include('layouts.sidebar-anggota')
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow-1">

            {{-- NAVBAR --}}
            <nav class="navbar navbar-neon px-3 d-flex justify-content-between">
                <span class="navbar-brand">📚 Sistem Perpustakaan Czennie 127</span>

                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold text-dark">
                        Halo, Czennie 127
                    </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-white btn-sm">
                            🔓 Logout
                        </button>
                    </form>
                </div>
            </nav>

            {{-- CONTENT --}}
            <div class="p-4">
                @yield('content')
            </div>

        </div>
    </div>
@endsection

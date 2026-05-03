<nav class="navbar bg-white px-3 d-flex justify-content-between" style="border-bottom:2px solid #39ff14;">

    <span class="navbar-brand d-flex align-items-center gap-2">
        <img src="{{ asset('images/logonct.png') }}" style="height:70px;">
        Sistem Perpustakaan Czennie
    </span>

    <div class="d-flex align-items-center gap-3">

        @auth
            <span class="fw-bold text-dark">
                Halo, {{ auth()->user()->name }}
            </span>
        @endauth

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-white btn-sm">
                <img src="{{ asset('images/gembok.png') }}" width="18">
                <span class="fw-bold">LOGOUT</span>
            </button>
        </form>

    </div>

</nav>

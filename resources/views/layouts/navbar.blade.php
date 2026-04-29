<nav class="navbar navbar-success bg-success px-3 d-flex justify-content-between">

    <span class="navbar-brand">📚 Sistem Perpustakaan</span>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-light btn-sm">
            Logout
        </button>
    </form>

</nav>

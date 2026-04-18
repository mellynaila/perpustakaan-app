<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">📚 E-Perpus</span>

    <div class="text-white">
        Halo, {{ session('username') ?? 'Admin' }} |

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>
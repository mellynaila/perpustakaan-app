<ul class="nav flex-column">

    <li>
        <a href="/dashboard-anggota" class="nav-link {{ request()->routeIs('dashboard.anggota') ? 'active' : '' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="/buku" class="nav-link {{ request()->routeIs('buku.index') ? 'active' : '' }}">
            Datfar Buku
        </a>
    </li>

    <li>
        <a href="/riwayat" class="nav-link {{ request()->routeIs('riwayat.index') ? 'active' : '' }}">
            Riwayat Peminjaman
        </a>
    </li>

</ul>

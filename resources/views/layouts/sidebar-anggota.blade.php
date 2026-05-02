<ul class="nav flex-column">

    <li>
        <a href="/dashboard-anggota" class="nav-link {{ request()->routeIs('anggota.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="/buku-list" class="nav-link {{ request()->routeIs('buku-list.index') ? 'active' : '' }}">
            Data Buku
        </a>
    </li>

    <li>
        <a href="/riwayat" class="nav-link {{ request()->routeIs('anggota.riwayat') ? 'active' : '' }}">
            Riwayat Peminjaman
        </a>
    </li>

</ul>

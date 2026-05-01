<ul class="nav flex-column">

    <li>
        <a href="/dashboard-anggota" class="nav-link {{ request()->routeIs('dashboard.anggota') ? 'active' : '' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="/buku-list" class="nav-link {{ request()->routeIs('buku-list.index') ? 'active' : '' }}">
            Data Buku
        </a>
    </li>

    <li>
        <a href="/laporan" class="nav-link {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
            Laporan Peminjaman
        </a>
    </li>

</ul>

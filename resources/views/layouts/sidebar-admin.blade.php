<ul class="nav flex-column">

    <li>
        <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="/buku" class="nav-link {{ request()->is('buku*') ? 'active' : '' }}">
            Kelola Buku
        </a>
    </li>

    <li>
        <a href="/anggota" class="nav-link {{ request()->is('anggota*') ? 'active' : '' }}">
            Data Anggota
        </a>
    </li>

</ul>

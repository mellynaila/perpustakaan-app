<div class="col-md-2 sidebar">
    <h4>📚 Perpus</h4>
    <hr>

    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
        Dashboard
    </a>

    <a href="/anggota" class="{{ request()->is('anggota*') ? 'active-menu' : '' }}">
        Data Anggota
    </a>

    <a href="/buku" class="{{ request()->is('buku*') ? 'active-menu' : '' }}">
        Kelola Buku
    </a>

    <a href="/peminjaman" class="{{ request()->is('peminjaman*') ? 'active-menu' : '' }}">
        Peminjaman
    </a>
</div>

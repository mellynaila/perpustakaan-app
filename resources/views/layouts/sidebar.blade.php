<div class="col-md-2 sidebar">
    <h4>📚 Perpus</h4>
    <hr>

    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
        🏠 Dashboard
    </a>

    <a href="/anggota" class="{{ request()->is('anggota*') ? 'active-menu' : '' }}">
        👥 Menu Anggota
    </a>
</div>

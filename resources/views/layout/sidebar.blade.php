<!-- admin sidebar -->
<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
    <div class="sidebar-header">
        <a class="brand-mark" href="{{ route('dashboard') }}" aria-label="SMART dashboard">
            <span class="brand-icon">
                <img src="{{ asset('assets/images/png/ftrc.png') }}"  alt="FTRC"
                    style="width: 32px; height: 32px; object-fit: contain;">
            </span>
            <span class="brand-copy">
                <span class="brand-title">SMART</span>
                <span class="brand-subtitle">Sistem Manajemen Adminstrasi</span>
            </span>
        </a>
    </div>

    <nav class="sidebar-nav">

        {{-- Dashboard --}}
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
            <span class="nav-text">Dashboard</span>
        </a>

        {{-- Menu per role --}}
        @if (Auth::user()->role == 'mahasiswa')
            <a class="nav-link {{ request()->routeIs('mahasiswa.submissions.index') ? 'active' : '' }}"
                href="{{ route('mahasiswa.submissions.index') }}">
                <span class="nav-icon"><i class="bi bi-clock-history"></i></span>
                <span class="nav-text">Riwayat Pengajuan</span>
            </a>

            <a class="nav-link {{ request()->routeIs('mahasiswa.submissions.create') ? 'active' : '' }}"
                href="{{ route('mahasiswa.submissions.create') }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-plus"></i></span>
                <span class="nav-text">Form Pengajuan</span>
            </a>
        @elseif (Auth::user()->role == 'kaprodi')
            <a class="nav-link {{ request()->routeIs('kaprodi.approvals.*') ? 'active' : '' }}"
                href="{{ route('kaprodi.approvals.index') }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-check"></i></span>
                <span class="nav-text">Pengajuan Surat</span>
            </a>
        @elseif (Auth::user()->role == 'tata_usaha' || Auth::user()->role == 'manager')
            <a class="nav-link {{ request()->routeIs('manager.letters.*') ? 'active' : '' }}"
                href="{{ route('manager.letters.index') }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-arrow-up"></i></span>
                <span class="nav-text">Kelola Surat</span>
            </a>
        @elseif (Auth::user()->role == 'admin')
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <span class="nav-icon"><i class="bi bi-people"></i></span>
                <span class="nav-text">Kelola Pengguna</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.prodi.*') ? 'active' : '' }}"
                href="{{ route('admin.prodi.index') }}">
                <span class="nav-icon"><i class="bi bi-building"></i></span>
                <span class="nav-text">Kelola Prodi</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.letter-types.*') ? 'active' : '' }}"
                href="{{ route('admin.letter-types.index') }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-ruled"></i></span>
                <span class="nav-text">Jenis Surat</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.staff-placements.*') ? 'active' : '' }}"
                href="{{ route('admin.staff-placements.index') }}">
                <span class="nav-icon"><i class="bi bi-person-gear"></i></span>
                <span class="nav-text">Assign Jabatan</span>
            </a>
        @endif

        {{-- <a class="nav-link" href="forms.html">
            <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
            <span class="nav-text">Forms</span>
        </a>
        <a class="nav-link" href="components.html">
            <span class="nav-icon"><i class="bi bi-grid-3x3-gap" aria-hidden="true"></i></span>
            <span class="nav-text">Components</span>
        </a>
        <a class="nav-link" href="alerts.html">
            <span class="nav-icon"><i class="bi bi-exclamation-triangle" aria-hidden="true"></i></span>
            <span class="nav-text">Alerts</span>
        </a>
        <a class="nav-link" href="modals.html">
            <span class="nav-icon"><i class="bi bi-window-stack" aria-hidden="true"></i></span>
            <span class="nav-text">Modals</span>
        </a>
        <a class="nav-link" href="settings.html">
            <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
            <span class="nav-text">Settings</span>
        </a>
        <a class="nav-link" href="blank.html">
            <span class="nav-icon"><i class="bi bi-file-earmark" aria-hidden="true"></i></span>
            <span class="nav-text">Blank Page</span>
        </a> --}}
    </nav>

    <div class="sidebar-user">
        <div class="sidebar-user-icon">
            <i class="bi bi-person-circle"></i>
        </div>
        <strong>{{ Auth::user()->name }}</strong>
        <small>{{ Auth::user()->role }}</small>
    </div>

    <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
    </div>
</aside>

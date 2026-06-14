    <!-- admin sidebar -->
    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
        <div class="sidebar-header">
            <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
                <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                <span class="brand-copy">
                    <span class="brand-title">adminHMD</span>
                    <span class="brand-subtitle">Admin Template</span>
                </span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <a class="nav-link active" href="index.html" aria-current="page">
                <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                <span class="nav-text">Dashboard</span>
            </a>

            {{-- mahasiswa dan elseif untuk kaprodi--}}
            @if (Auth::user()->role == 'mahasiswa')
                <a class="nav-link" href="{{ route('mahasiswa.submissions.index') }}">
                    <span class="nav-icon"><i class="bi bi-clock-history"></i></span>
                    <span class="nav-text">Riwayat Pengajuan</span>
                </a>
                <a class="nav-link" href="{{ route('mahasiswa.submissions.create') }}">
                    <span class="nav-icon"><i class="bi bi-file-earmark-plus"></i></span>
                    <span class="nav-text">Form Pengajuan</span>
                </a>
            @elseif (Auth::user()->role == 'kaprodi')
                <a class="nav-link" href="{{ route('kaprodi.approvals.index') }}">
                    <span class="nav-icon"><i class="bi bi-file-earmark-check"></i></span>
                    <span class="nav-text">Pengajuan Surat</span>
                </a>
                <a class="nav-link" href="{{ route('kaprodi.users.index') }}">
                    <span class="nav-icon"><i class="bi bi-people"></i></span>
                    <span class="nav-text">Daftar Pengguna</span>
                </a>
            @endif
            <a class="nav-link" href="tables.html">
                <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                <span class="nav-text">Tables</span>
            </a>
            <a class="nav-link" href="forms.html">
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
            </a>
        </nav>

        <div class="sidebar-user">
            <img class="avatar-img avatar-md sidebar-user-avatar" src="../assets/images/avatar/avatar.jpg"
                alt="Admin Hasan">
            <strong>Admin Hasan</strong>
            <small>Active Workspace</small>
        </div>

        <div class="sidebar-footer">
            <span class="status-dot"></span>
            <span class="sidebar-footer-text">System running smoothly</span>
        </div>
    </aside>

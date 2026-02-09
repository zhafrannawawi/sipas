<!-- Sidebar utama -->
<aside class="left-sidebar">

    <!-- Container sidebar + scroll -->
    <div>

        <!-- Logo & tombol close (mobile) -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo-psrent.svg') }}" alt="Logo" />
            </a>

            {{-- Toggle sidebar untuk layar kecil --}}
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        {{-- Navigasi sidebar --}}
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                {{-- Section Home --}}
                <li class="nav-small-cap">
                    <span class="hide-menu">Home</span>
                </li>

                {{-- Menu Dashboard --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span><i class="fas fa-th-large"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{-- Section Data Master --}}
                <li class="nav-small-cap">
                    <span class="hide-menu">Menu Aktivitas</span>
                </li>

                {{-- Menu Inventaris --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.device.*') ? 'active' : '' }}"
                        href="{{route('admin.device.index')}}" aria-expanded="false">
                        <span><i class="fas fa-boxes"></i></span>
                        <span class="hide-menu">Perangkat</span>
                    </a>
                </li>

                {{-- Menu Kategori --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                        href="{{ route('admin.category.index') }}" aria-expanded="false">
                        <span><i class="fas fa-tags"></i></span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>


                {{-- Menu Peminjaman --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.loan.*') ? 'active' : '' }}"
                        href="{{ route('admin.loan.index') }}" aria-expanded="false">
                        <span><i class="fas fa-clipboard-list"></i></span>
                        <span class="hide-menu">Peminjaman</span>
                    </a>
                </li>

                {{-- Menu Peminjaman --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.history.*') ? 'active' : '' }}"
                        href="{{ route('admin.history.index') }}" aria-expanded="false">
                        <span><i class="fas fa-history"></i></span>
                        <span class="hide-menu">Riwayat Peminjaman</span>
                    </a>
                </li>


                {{-- Menu Log Aktivitas --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.activityLog.*') ? 'active' : '' }}"
                        href="{{ route('admin.activityLog.index') }}" aria-expanded="false">
                        <span><i class="fas fa-chalkboard-teacher"></i></span>
                        <span class="hide-menu">Log Aktifitas</span>
                    </a>
                </li>

                {{-- Section Manajemen Akun --}}
                <li class="nav-small-cap">
                    <span class="hide-menu">Manajemen Akun</span>
                </li>

                {{-- Menu Administrator --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.administrator.*') ? 'active' : '' }}"
                        href="{{ route('admin.administrator.index') }}" aria-expanded="false">
                        <span><i class="fas fa-user-shield"></i></span>
                        <span class="hide-menu">Administrator</span>
                    </a>
                </li>


                {{-- Menu Petugas --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.officer.*') ? 'active' : '' }}"
                        href="{{ route('admin.officer.index') }}" aria-expanded="false">
                        <span><i class="fas fa-user-tie"></i></span>
                        <span class="hide-menu">Petugas</span>
                    </a>
                </li>


                {{-- Menu Peminjam --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.borrower.*') ? 'active' : '' }}"
                        href="{{ route('admin.borrower.index') }}" aria-expanded="false">
                        <span><i class="fas fa-user"></i></span>
                        <span class="hide-menu">Peminjam</span>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->

    </div>
    <!-- End Sidebar scroll -->

</aside>
<!-- Sidebar End -->

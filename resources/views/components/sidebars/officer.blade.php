<!-- Sidebar utama -->
<aside class="left-sidebar">

    <!-- Container sidebar + scroll -->
    <div>

        <!-- Logo & tombol close (mobile) -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="Logo" />
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
                    <a class="sidebar-link" href="{{ route('officer.dashboard') }}" aria-expanded="false">
                        <span><i class="fas fa-th-large"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{-- Section Data Master --}}
                <li class="nav-small-cap">
                    <span class="hide-menu">Data master</span>
                </li>

                {{-- Menu Peminjaman --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('loan.*') ? 'active' : '' }}"
                        href="{{ route('officer.loan.index') }}" aria-expanded="false">
                        <span><i class="fas fa-clipboard-list"></i></span>
                        <span class="hide-menu">Peminjaman</span>
                    </a>
                </li>

                {{-- Menu Peminjaman --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('return.*') ? 'active' : '' }}"
                        href="{{ route('officer.return.index') }}" aria-expanded="false">
                        <span><i class="fas fa-clipboard-list"></i></span>
                        <span class="hide-menu">Pengembalian</span>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- End Sidebar navigation -->

    </div>
    <!-- End Sidebar scroll -->

</aside>
<!-- Sidebar End -->

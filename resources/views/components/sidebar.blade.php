<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>

        {{-- <!-- Sidebar navigation--> --}}
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <span class="hide-menu">Home</span>
                </li>

                {{-- Item Dashboard --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <i class="fas fa-th-large"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>


                <li class="nav-small-cap">
                    <span class="hide-menu">Data master</span>
                </li>

                {{-- Item Inventaris --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('inventory.index') }}" aria-expanded="false">
                        <span>
                            <i class="fas fa-boxes"></i>
                        </span>
                        <span class="hide-menu">Inventaris</span>
                    </a>
                </li>

                {{-- Kategori --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="fas fa-tags"></i>
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" data-bs-toggle="collapse"
                        data-bs-target="#submenuPeminjaman" aria-expanded="false" aria-controls="submenuPeminjaman">
                        <span class="d-flex">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="hide-menu ms-2">Peminjaman</span>
                    </a>

                    <div class="collapse" id="submenuPeminjaman">
                        <ul class="nav flex-column ms-3">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./peminjaman-barang.html">
                                    <i class="fas fa-box-open me-2"></i>
                                    <span class="hide-menu">Peminjaman Hari Ini</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./peminjaman-ruangan.html">
                                    <i class="fas fa-door-open me-2"></i>
                                    <span class="hide-menu">Kelola Peminjaman</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" data-bs-toggle="collapse"
                        data-bs-target="#submenuPeminjaman" aria-expanded="false" aria-controls="submenuPeminjaman">
                        <span class="d-flex">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="hide-menu ms-2">Pengembalian</span>
                    </a>

                    <div class="collapse" id="submenuPeminjaman">
                        <ul class="nav flex-column ms-3">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./peminjaman-barang.html">
                                    <i class="fas fa-box-open me-2"></i>
                                    <span class="hide-menu">Pengembalian Hari Ini</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./peminjaman-ruangan.html">
                                    <i class="fas fa-door-open me-2"></i>
                                    <span class="hide-menu">Kelola Pengembalian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--  --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="fas fa-chalkboard-teacher"></i>
                        </span>
                        <span class="hide-menu">Log Aktifitas</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Manajemen Akun</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="hide-menu">Administrator</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="fas fa-user-tie"></i>
                        </span>
                        <span class="hide-menu">Petugas</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="fas fa-user-graduate"></i>
                        </span>
                        <span class="hide-menu">Siswa</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->

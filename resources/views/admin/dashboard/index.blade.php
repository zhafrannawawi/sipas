<x-layout>

    <div class="row g-2">

        {{-- Total Administrator --}}
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center gap-3">

                    <!-- Icon -->
                    <div class="p-3 bg-primary text-white d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-shield fs-5"></i>
                    </div>

                    <!-- Text -->
                    <div>
                        <h6 class="text-muted mb-1">Total Administrator</h6>
                        <h4 class="fw-bold mb-0">101</h4>
                    </div>

                </div>
            </div>
        </div>

        {{-- Total Petugas --}}
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center gap-3">

                    <!-- Icon -->
                    <div class="p-3 bg-success text-white d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-tie fs-5"></i>
                    </div>

                    <!-- Text -->
                    <div>
                        <h6 class="text-muted mb-1">Total Petugas</h6>
                        <h4 class="fw-bold mb-0">101</h4>
                    </div>

                </div>
            </div>
        </div>

        {{-- Total Peminjam --}}
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center gap-3">

                    <!-- Icon -->
                    <div class="p-3 bg-secondary text-white d-flex align-items-center justify-content-center">
                        <i class="fas fa-user fs-5"></i>
                    </div>

                    <!-- Text -->
                    <div>
                        <h6 class="text-muted mb-1">Total Peminjam</h6>
                        <h4 class="fw-bold mb-0">101</h4>
                    </div>

                </div>
            </div>
        </div>

        {{-- Total Inventaris --}}
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center gap-3">

                    <!-- Icon -->
                    <div class="p-3 bg-warning text-white d-flex align-items-center justify-content-center">
                        <i class="fas fa-boxes fs-5   "></i>
                    </div>

                    <!-- Text -->
                    <div>
                        <h6 class="text-muted mb-1">Total Inventaris</h6>
                        <h4 class="fw-bold mb-0">101</h4>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="row g-4">

        <!-- CHART PEMINJAMAN -->
        <div class="col-12 col-lg-9">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <h4 id="card-chart-borrowing-title">Peminjaman Tahun Ini</h4>

                    <div class="mt-3">
                        <label for="year" class="form-label">Isi Tahun</label>
                        <input type="number" id="year" class="form-control" placeholder="Masukkan tahun..."
                            value="{{ date('Y') }}">
                        <div class="form-text">
                            Tekan <strong>Enter</strong> untuk menampilkan grafik berdasarkan tahun yang dipilih.
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="chart-borrowing-by-year" style="min-height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">

            <!-- CARD INFO (misalnya total / user aktif) -->

            <!-- PEMINJAM BARU -->
            <div class="card">
                <div class="card-header">
                    <h4>Peminjam Baru Terdaftar</h4>
                </div>

                <div class="card-body">

                    <!-- ITEM MAHASISWA -->
                    <div class="recent-message d-flex align-items-center mb-3">
                        <div class="ms-3">
                            <h6 class="mb-0">Nama Peminjam</h6>
                            <small class="text-muted">NISN / Jurusan</small>
                        </div>
                    </div>

                    <a href="#" class="btn btn-outline-primary w-100 fw-bold mt-3">
                        Daftar Mahasiswa
                    </a>

                </div>
            </div>

        </div>
    </div>



</x-layout>

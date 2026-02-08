<x-layout>

    <x-slot:title>
        Dashboard
    </x-slot:title>

    <a href="{{ route('officer.loans.export') }}" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Download Laporan
    </a>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Menunggu Persetujuan</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $pendingRequests }}</h1>
                        <i class="fas fa-clock fa-3x opacity-50"></i>
                    </div>
                    <p class="card-text">Permintaan perlu diproses.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Sedang Dipinjam</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $activeLoans }}</h1>
                        <i class="fas fa-hand-holding fa-3x opacity-50"></i>
                    </div>
                    <p class="card-text">Alat belum kembali.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Sudah Dikembalikan</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $returnedLoans }}</h1>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                    <p class="card-text">Riwayat peminjaman selesai.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- CHART PEMINJAMAN -->
        <div class="col">
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
    </div>

</x-layout>

<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>


    {{-- 1. HEADER & ALERT SECTION --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Dashboard</h3>
    </div>

    {{-- 2. KARTU STATISTIK (ROW 1) --}}
    <div class="row g-3 mb-4">

        {{-- Total Pinjaman --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card bg-primary text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase fs-7 text-white-50 fw-bold ls-1">Total <br>Pinjaman</h6>
                            <h2 class="fw-bold text-white display-6 mb-0">{{ $totalLoans }}</h2>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="fas fa-boxes fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sedang Dipinjam --}}
        <div class="col-12 col-sm-6 col-xl-4">
            {{-- PERBAIKAN: Gunakan text-dark di bg-warning agar kontras aman --}}
            <div class="card bg-warning text-dark h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase fs-7 text-white-50 fw-bold ls-1">Sedang <br>Dipinjam</h6>
                            <h2 class="fw-bold text-white display-6 mb-0">{{ $activeLoans }}</h2>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="fas fa-archive text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Terlambat --}}
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card bg-danger text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase fs-7 text-white-50 fw-bold ls-1">Terlambat Pengembalian</h6>
                            <h2 class="fw-bold text-white display-6 mb-0">{{ $overdueLoans }}</h2>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. CONTENT AREA (Chart & Activity) --}}
    <div class="row">
        {{-- Bagian Grafik (Lebih Lebar) --}}
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                {{-- Header Grafik dibuat "Toolbar Style" --}}
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-dark">Jatuh Tempo Hari Ini</h5>
                    <span class="badge bg-danger rounded-pill">{{ $dueTodayLoans->count() }} Item</span>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Alat</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Rencana Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                {{-- Loop data kategori --}}

                                @forelse ($dueTodayLoans as $loan)
                                    <tr>
                                        {{-- Nomor urut mengikuti pagination --}}
                                        <td>
                                            {{ $dueTodayLoans->firstItem() + $loop->index }}
                                        </td>
                                        <td>{{ $loan->inventory->name }}</td>
                                        <td>{{ $loan->loan_date->translatedFormat('d F Y') }}</td>
                                        <td>{{ $loan->due_date->translatedFormat('d F Y') }}</td>
                                        <td>
                                            <span class="badge {{ $loan->status_badge['class'] }}">
                                                <i class="fas {{ $loan->status_badge['icon'] }}"></i>
                                                {{ $loan->status_badge['label'] }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">

                                                {{-- 1. TOMBOL DETAIL (VIEW) --}}
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailLoanModal{{ $loan->id }}"
                                                    title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                {{-- JIKA STATUS BORROWED --}}
                                                @if ($loan->status === 'borrowed')
                                                    {{-- 4. TOMBOL KEMBALIKAN --}}
                                                    <form action="{{ route('borrower.loan.return', $loan->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Konfirmasi pengembalian barang?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-warning btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Kembalikan Barang">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @include('borrower.history.modal.detail_loan')
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-5">
                                            <i class="fas fa-clipboard-check fa-3x mb-3 opacity-50"></i><br>
                                            Semua aman! Tidak ada tanggungan hari ini.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold text-dark">Denda Saya</h5>
                    <span class="badge bg-danger rounded-pill">{{ $dueTodayLoans->count() }} Item</span>
                </div>

                <div class="card-body p-1">
                    <table class="table table-striped align-middle mb-0">
                        <tbody>
                            @forelse ($dueTodayLoans as $loan)
                                <tr>
                                    <td class="ps-3" style="width: 50px;">{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $loan->inventory->name }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $loan->due_date->translatedFormat('d F Y') }}
                                        </small>
                                    </td>
                                    <td class="text-end pe-3">
                                        <button type="button" class="btn btn-outline-warning btn-sm"
                                            title="Kembalikan Barang">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5">
                                        <i class="fas fa-clipboard-check fa-3x mb-3 opacity-50"></i><br>
                                        Semua aman! Tidak ada tanggungan hari ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-layout>

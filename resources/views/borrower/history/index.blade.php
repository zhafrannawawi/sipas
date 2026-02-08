    <x-layout>

        <x-slot:title>
            Riwayat Peminjaman
        </x-slot:title>

        {{-- Header halaman --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-0">Riwayat Pinjaman</h3>
                <small class="text-muted">Riwayat peminjaman alat</small>

            </div>
        </div>

        <x-alert></x-alert>

        <div class="card shadow-sm">

            {{-- Header tabel + trigger modal create --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Riwayat Peminjaman</h5>
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

                            @forelse ($loans as $loan)
                                <tr>
                                    {{-- Nomor urut mengikuti pagination --}}
                                    <td>
                                        {{ $loans->firstItem() + $loop->index }}
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
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
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
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                        Tidak ada riwayat peminjaman
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="card-footer">
                {{ $loans->links() }}
            </div>
        </div>


    </x-layout>

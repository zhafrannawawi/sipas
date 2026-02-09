    <x-layout>

        <x-slot:title>
            Peminjaman
        </x-slot:title>

        {{-- Header halaman --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-0">Ajukan Peminjaman</h3>
                <small class="text-muted">Pengajuan peminjaman alat</small>

            </div>
        </div>

        <x-alert></x-alert>

        <div class="card shadow-sm">

            {{-- Header tabel + trigger modal create --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Peminjaman</h5>

                <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                    data-bs-target="#createLoanModal">
                    <i class="fas fa-plus-circle me-1"></i>
                    Ajukan Pinjaman
                </button>

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
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop data kategori --}}

                            @forelse ($loans as $loan)
                                <tr>
                                    {{-- Nomor urut mengikuti pagination --}}
                                    <td>
                                        {{ $loans->firstItem() + $loop->index }}
                                    </td>
                                    <td>{{ $loan->device->name }}</td>
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
                                            {{-- Tombol Detail selalu muncul --}}
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showDetailLoanModal{{ $loan->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            @if ($loan->status === 'borrowed')
                                                <form action="{{ route('borrower.loan.return', $loan->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm"
                                                        onclick="return confirm('Kembalikan barang sekarang?')">
                                                        <i class="fas fa-check-circle"></i> Kembalikan
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                @include('borrower.loan.modal.detail_loan')
                                @include('borrower.loan.modal.edit')
                                @include('borrower.loan.modal.cancel')
                                @include('borrower.loan.modal.fine_payment')

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                        Tidak ada peminjaman
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

        {{-- Modal Untuk Ajukan Pinjaman --}}
        @include('borrower.loan.modal.create')


    </x-layout>

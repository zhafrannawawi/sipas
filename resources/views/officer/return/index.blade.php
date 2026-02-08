<x-layout>

    <x-slot:title>
        Pengembalian
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Pengembalian</h3>
            <small class="text-muted">Memantau Pengembalian Alat</small>
        </div>
    </div>

    <div class="card shadow-sm">

        {{-- Header tabel + trigger modal create --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Pengembalian</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th>Tgl Pinjam</th>
                            <th>Rencana Kembali</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data kategori --}}
                        @forelse ($returns as $return)
                            <tr>
                                {{-- Nomor urut mengikuti pagination --}}
                                <td>
                                    {{ $returns->firstItem() + $loop->index }}
                                </td>

                                <td>{{ $return->user->name }}</td>
                                <td>{{ $return->inventory->name }}</td>
                                <td>{{ $return->loan_date->translatedFormat('d F Y') }}</td>
                                <td>{{ $return->due_date->translatedFormat('d F Y') }}</td>

                                <td>
                                    @if ($return->status == 'pending')
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> Menunggu
                                        </span>
                                    @elseif ($return->status == 'borrowed')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle me-1"></i> Dipinjam
                                        </span>
                                    @elseif($return->status == 'validation')
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> Validasi
                                        </span>
                                    @else
                                        <span class="badge bg-primary">
                                            <i class="fas fa-check-circle me-1"></i> Dikembalikan
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#showDetailLoanModal{{ $return->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    @if ($return->status === 'validation')
                                        <form action="{{ route('officer.return.validate', $return->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title="Validasi">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                            @include('officer.return.modal.detail_loan')

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                    Tidak ada data pengembalian
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $returns->links() }}
        </div>
    </div>



</x-layout>

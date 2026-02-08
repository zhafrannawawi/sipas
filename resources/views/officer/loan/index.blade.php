<x-layout>

    {{-- Judul halaman --}}
    <x-slot:title>
        Peminjaman
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Peminjaman</h3>
            <small class="text-muted">Manajemen Peminjaman Alat</small>
        </div>
    </div>

    <div class="card shadow-sm">

        {{-- Header tabel + trigger modal create --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Peminjaman</h5>
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

                        @forelse ($loans as $loan)
                            <tr>
                                {{-- Nomor urut mengikuti pagination --}}
                                <td>
                                    {{ $loans->firstItem() + $loop->index }}
                                </td>

                                <td>{{ $loan->user->name }}</td>
                                <td>{{ $loan->inventory->name }}</td>
                                <td>{{ $loan->loan_date->translatedFormat('d F Y') }}</td>
                                <td>{{ $loan->due_date->translatedFormat('d F Y') }}</td>
                                <td>
                                    @if ($loan->status == 'pending')
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> Menunggu
                                        </span>
                                    @elseif ($loan->status == 'borrowed')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle me-1"></i> Dipinjam
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#showDetailLoanModal{{ $loan->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    @if ($loan->status === 'pending')
                                        <form action="{{ route('officer.loan.approve', $loan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title="Setujui">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                            @include('officer.loan.modal.detail_loan')

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                    Tidak ada data peminjaman
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-layout>

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

            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createLoanModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Peminjaman
            </button>
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
                        @foreach ($loans as $loan)
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
                                    <span class="badge {{ $loan->status_badge['class'] }}">
                                        <i class="fas {{ $loan->status_badge['icon'] }}"></i>
                                        {{ $loan->status_badge['label'] }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#showDetailLoanModal{{ $loan->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    @if ($loan->status == 'pending')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editLoanModal{{ $loan->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    @endif

                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteloanModal{{ $loan->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal edit & delete per kategori --}}
                            @include('admin.loan.modal.edit')
                            {{-- @include('admin.loan.modal.delete', ['loan' => $loan]) --}}
                            @include('admin.loan.modal.detail_loan')
                        @endforeach
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

{{-- Modal create kategori --}}
@include('admin.loan.modal.create')

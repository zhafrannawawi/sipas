<x-layout>

    {{-- Judul halaman yang dikirim ke layout --}}
    <x-slot:title>
        Peminjam
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Peminjam</h3>
            <small class="text-muted">Manajemen Peminjam </small>
        </div>
    </div>

    <div class="card shadow-sm">

        {{-- Header card + trigger modal tambah peminjam --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Peminjam</h5>

            <button type="button" class="btn btn-primary btn-sm p-2" data-bs-toggle="modal"
                data-bs-target="#createBorrowerModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Peminjam
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-start">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data peminjam dengan pagination --}}
                        @foreach ($borrowers as $borrower)
                            <tr>
                                {{-- Penomoran berkelanjutan antar halaman --}}
                                <td scope="row">
                                    {{ $borrowers->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-bold text-start">{{ $borrower->email }}</td>
                                <td>{{ $borrower->name }}</td>
                                <td>{{ $borrower->phone_number }}</td>

                                {{-- Aksi edit & hapus --}}
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editBorrowerModal{{ $borrower->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a class="btn btn-danger btn-sm" href="" data-bs-toggle="modal"
                                        data-bs-target="#deleteBorrowerModal{{ $borrower->id }}" role="button">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal hapus peminjam --}}
                            @include('admin.borrower.modal.delete')

                            {{-- Modal edit peminjam --}}
                            @include('admin.borrower.modal.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Navigasi pagination --}}
        <div class="card-footer">
            {{ $borrowers->links() }}
        </div>
    </div>

</x-layout>

{{-- Modal tambah peminjam --}}
@include('admin.borrower.modal.create')

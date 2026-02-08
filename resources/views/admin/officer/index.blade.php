<x-layout>

    {{-- Title halaman --}}
    <x-slot:title>
        Petugas
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Petugas</h3>
            <small class="text-muted">Manajemen Petugas</small>
        </div>
    </div>

    {{-- Card utama --}}
    <div class="card shadow-sm">

        {{-- Header card + trigger modal create --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Petugas</h5>

            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createOfficerModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Petugas
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                {{-- Tabel daftar petugas --}}
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-start">Email</th>
                            <th>Nama</th>
                            <th>Nomor Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- Loop data petugas --}}
                        @foreach ($officers as $officer)
                            <tr>
                                {{-- Nomor urut pagination --}}
                                <td>
                                    {{ $officers->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-bold text-start">{{ $officer->email }}</td>
                                <td>{{ $officer->name }}</td>
                                <td>{{ $officer->phone_number }}</td>

                                {{-- Aksi edit & delete --}}
                                <td>
                                    {{-- Trigger modal edit --}}
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editOfficerModal{{ $officer->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Trigger modal delete --}}
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteOfficerModal{{ $officer->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            {{-- Include modal edit & delete per item --}}
                            @include('admin.officer.modal.delete', ['officer' => $officer])
                            @include('admin.officer.modal.edit', ['officer' => $officer])
                        @endforeach
                    </tbody>
                </table>

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $officers->links() }}
        </div>
    </div>

</x-layout>

{{-- Modal create petugas --}}
@include('admin.officer.modal.create')

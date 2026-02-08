<x-layout>

    {{-- Title halaman --}}
    <x-slot:title>
        Inventaris
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Inventaris</h3>
            <small class="text-muted">Manajemen data alat</small>
        </div>
    </div>

    {{-- Card utama --}}
    <div class="card shadow-sm">

        {{-- Header card + tombol tambah --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Alat</h5>

            {{-- Trigger modal create --}}
            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createInventoryModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Alat
            </button>
        </div>

        <div class="card-body">

            {{-- Wrapper table agar responsif --}}
            <div class="table-responsive">
                <table class="table align-middle text-center mb-0">

                    {{-- Header tabel --}}
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-start">Nama Alat</th>
                            <th>Kode Alat</th>
                            <th>Kategori Alat</th>
                            <th>Stok Barang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- Loop data inventory --}}
                        @foreach ($inventories as $inventory)
                            <tr>

                                {{-- Nomor urut berdasarkan pagination --}}
                                <td>
                                    {{ $inventories->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-bold text-start">
                                    {{ $inventory->name }}
                                </td>
                                <td>{{ $inventory->unique_code }}</td>
                                <td>{{ $inventory->category->name ?? 'Tanpa Kategori'}}</td>
                                <td>{{ $inventory->stock }}</td>

                                {{-- Kolom aksi --}}
                                <td class="text-center">

                                    {{-- Trigger modal edit --}}
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editInventoryModal{{ $inventory->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Trigger modal delete --}}
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteInventoryModal{{ $inventory->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>

                            {{-- Modal delete per item --}}
                            @include('admin.inventory.modal.delete', ['inventory' => $inventory])

                            {{-- Modal edit per item --}}
                            @include('admin.inventory.modal.edit', ['inventory' => $inventory])
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $inventories->links() }}
        </div>
    </div>

</x-layout>

{{-- Modal create inventory --}}
@include('admin.inventory.modal.create')

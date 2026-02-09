<x-layout>

    {{-- Title halaman --}}
    <x-slot:title>
        Perangkat
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Perangkat</h3>
            <small class="text-muted">Manajemen data perangkat</small>
        </div>
    </div>

    {{-- Card utama --}}
    <div class="card shadow-sm">

        {{-- Header card + tombol tambah --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Perangkat</h5>

            {{-- Trigger modal create --}}
            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createInventoryModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Perangkat
            </button>
        </div>

        <x-alert></x-alert>
        <div class="card-body">

            {{-- Wrapper table agar responsif --}}
            <div class="table-responsive">
                <table class="table align-middle text-center mb-0">

                    {{-- Header tabel --}}
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-start">Nama Perangkat</th>
                            <th>Kode</th>
                            <th>Kategori Perangkat</th>
                            <th>Stok</th>
                            <th>Harga Sewa/Hari</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- Loop data inventory --}}
                        @foreach ($devices as $device)
                            <tr>

                                {{-- Nomor urut berdasarkan pagination --}}
                                <td>
                                    {{ $devices->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-bold text-start">
                                    {{ $device->name }}
                                </td>
                                <td>{{ $device->code }}</td>
                                <td>{{ $device->category->name ?? 'Tanpa Kategori' }}</td>
                                <td>{{ $device->stock }}</td>
                                <td>{{number_format($device->price_per_day ) }}</td>
                                <td>{{ $device->description}}</td>

                                {{-- Kolom aksi --}}
                                <td class="text-center">

                                    {{-- Trigger modal edit --}}
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editInventoryModal{{ $device->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Trigger modal delete --}}
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteInventoryModal{{ $device->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>
                            </tr>

                            {{-- Modal delete per item --}}
                            @include('admin.device.modal.delete')

                            {{-- Modal edit per item --}}
                            @include('admin.device.modal.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $devices->links() }}
        </div>
    </div>

</x-layout>

{{-- Modal create inventory --}}
@include('admin.device.modal.create')

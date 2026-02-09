<x-layout>

    {{-- Title halaman --}}
    <x-slot:title>
        Inventaris
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">DaftarPerangkat</h3>
            <small class="text-muted">Daftar perangkat yang dapat dipinjam</small>
        </div>


    </div>

    {{-- Card utama --}}
    <div class="card shadow-sm">

        {{-- Header card --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Alat</h5>
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
                            <th>Harga Sewa</th>
                            <th>Stok Barang</th>
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
                                <td>{{ $device->category->name }}</td>
                                <td>Rp {{number_format( $device->price_per_day) }}/ Hari</td>
                                <td>{{ $device->stock }}</td>
                            </tr>
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

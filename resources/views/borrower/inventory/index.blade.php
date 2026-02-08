<x-layout>

    {{-- Title halaman --}}
    <x-slot:title>
        Inventaris
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Daftar Inventaris</h3>
            <small class="text-muted">Daftar barang yang dapat dipinjam</small>
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
                            <th>Stok Barang</th>
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
                                <td>{{ $inventory->category->name }}</td>
                                <td>{{ $inventory->stock }}</td>
                            </tr>
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

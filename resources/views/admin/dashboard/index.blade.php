<x-layout>

    <x-slot:title>
        Dashboard
    </x-slot:title>


    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow text-white bg-primary mb-3">
                <div class="card-header fw-bold">Total Peminjam</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $totalUsers }}</h1>
                        <i class="fas fa-users fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow text-white bg-info mb-3">
                <div class="card-header fw-bold">Total Alat</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $totalInventories }}</h1>
                        <i class="fas fa-boxes fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow text-white bg-secondary mb-3">
                <div class="card-header fw-bold">Total Transaksi</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">{{ $activeLoans }}</h1>
                        <i class="fas fa-clipboard-list fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="card shadow text-white bg-success mb-3">
                <div class="card-header fw-bold">Total Denda</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-light">120K</h1>
                        <i class="fas fa-money-bill-wave fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <!-- CHART PEMINJAMAN -->
        <div class="col-12 col-sm-6 col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Terlambat Pengembalian Alat</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Rencana Kembali</th>
                                    <th scope="col">Terlambat</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>R1C2</td>
                                    <td>R1C3</td>
                                </tr>
                                <tr class="">
                                    <td scope="row">Item</td>
                                    <td>Item</td>
                                    <td>Item</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Log Aktivitas</h5>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</x-layout>

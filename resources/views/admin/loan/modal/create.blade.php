<div class="modal fade" id="createLoanModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Tambah Data Pinjaman
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.loan.store') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <h6 class="text-primary mb-3">Informasi Peminjaman</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="create_borrower_id" class="form-label fw-bold">Peminjam</label>
                            <select class="form-select" name="user_id" id="create_borrower_id" required>
                                <option value="" selected disabled hidden>-- Pilih Peminjam --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label id="'create_device_id" class="form-label fw-bold">Alat / Barang</label>
                            <select class="form-select" name="device_id" id="'create_device_id" required>
                                @foreach ($devices as $device)
                                    <option value="" selected disabled hidden>-- Pilih Perangkat --</option>
                                    {{-- Kita simpan harga di atribut data-price --}}
                                    <option value="{{ $device->id }}">
                                        {{ $device->name }} (Stok: {{ $device->stock }}) (Rp
                                        {{ number_format($device->price_per_day) }}/Hari)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h6 class="text-primary mb-3">Jadwal Peminjaman</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="create_loan_date" class="form-label fw-bold">Tgl Pinjam</label>
                            <input type="date" class="form-control" name="loan_date" id="create_loan_date"
                                min="{{ now()->toDateString() }}" required>

                        </div>

                        <div class="col-md-6">
                            <label for="create_due_date" class="form-label fw-bold">Rencana Kembali</label>
                            <input type="date" class="form-control" name="due_date" id="create_due_date"
                                min="{{ now()->toDateString() }}" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light justify-content-between">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-door-closed    "></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

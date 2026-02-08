<!-- Modal -->
<div class="modal fade" id="createLoanModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Tambah Pinjaman
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('borrower.loan.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Pilih Alat</label>
                        <select class="form-select" name="inventory_id" required>
                            <option selected disabled hidden>-- Pilih Alat --</option>

                            @foreach ($inventories as $inventory)
                                <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="loan_date" min="{{ now()->toDateString() }}"
                            required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Rencana Kembali</label>
                        <input type="date" class="form-control" name="due_date" min="{{ now()->toDateString() }}"
                            required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-door-closed-closed me-1"> </i>Kembali
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle me-1"></i>
                        Ajukan Pinjaman</button>
                </div>
            </form>

        </div>
    </div>
</div>

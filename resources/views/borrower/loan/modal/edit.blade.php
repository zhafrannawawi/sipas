<!-- Modal -->
<div class="modal fade" id="editLoanModal{{ $loan->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('borrower.loan.update', $loan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Pilih Alat</label>
                        <select class="form-select" name="inventory_id" required>
                            <option disabled hidden>-- Pilih Alat --</option>

                            @foreach ($inventories as $inventory)
                                <option value="{{ $inventory->id }}"
                                    {{ $loan->inventory_id == $inventory->id ? 'selected' : '' }}>
                                    {{ $inventory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="loan_date"
                            value="{{ $loan->loan_date->format('Y-m-d') }}" min="{{ now()->toDateString() }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Rencana Kembali</label>
                        <input type="date" class="form-control" name="due_date"
                            value="{{ $loan->due_date->format('Y-m-d') }}" min="{{ now()->toDateString() }}" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-door-closed-closed    "></i>
                        Kembali
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>

                        Update Pinjaman
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

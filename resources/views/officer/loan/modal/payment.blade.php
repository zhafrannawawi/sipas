<div class="modal fade" id="approveModal{{ $loan->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Sewa PS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('officer.loan.approve', $loan->id) }}" method="POST">
                @csrf
                @method('PATCH') <div class="modal-body">
                    <p>Penyewa: <strong>{{ $loan->user->name }}</strong></p>
                    <p>Unit: <strong>{{ $loan->device->name }}</strong></p>
                    <p>Total Tagihan: <strong class="text-danger">Rp {{ number_format($loan->total_price) }}</strong>
                    </p>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Uang Diterima (Rp)</label>
                        <input type="number" name="pay_price" class="form-control"
                            placeholder="Masukkan nominal uang..." required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Terima Uang & Serahkan Unit</button>
                </div>
            </form>
        </div>
    </div>
</div>

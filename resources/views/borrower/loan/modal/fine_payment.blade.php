<div class="modal fade" id="finePaymentModal{{ $loan->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('borrower.loan.return', $loan->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Pembayaran Denda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Barang ini sudah melewati batas waktu pengembalian.</p>
                    <div class="mb-3">
                        <label>Total Denda</label>
                        {{-- Memanggil fungsi calculateFine dari Model --}}
                        <input type="text" class="form-control"
                            value="Rp {{ number_format($loan->calculateFine()) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Nominal Bayar</label>
                        <input type="number" name="amount_paid" class="form-control" placeholder="Masukkan Angka"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Bayar & Kembalikan</button>
                </div>
            </div>
        </form>
    </div>
</div>

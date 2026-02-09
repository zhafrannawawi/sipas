<div class="modal fade" id="returnModal{{$return->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Konfirmasi Pengembalian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('officer.loan.return',$return->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    @php
                        $fineAmount =$return->calculateFine();
                    @endphp

                    <p>Penyewa: <strong>{{$return->user->name }}</strong></p>
                    <p>Unit: <strong>{{$return->device->name }}</strong></p>

                    <hr>

                    @if ($fineAmount > 0)
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>TERLAMBAT!</strong> <br>
                            Wajib Bayar Denda: <strong class="fs-5">Rp {{ number_format($fineAmount) }}</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Uang Denda Diterima</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="amount_paid" class="form-control"
                                    placeholder="Masukkan uang..." required min="{{ $fineAmount }}">
                            </div>
                            <div class="form-text text-danger">*Harap tagih sesuai nominal denda.</div>
                        </div>
                    @else
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Pengembalian Tepat Waktu. <br>
                            <strong>Tidak ada denda (Rp 0).</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Uang Denda</label>
                            <input type="number" name="amount_paid" class="form-control bg-light" value="0"
                                readonly>
                        </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Terima & Selesai
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

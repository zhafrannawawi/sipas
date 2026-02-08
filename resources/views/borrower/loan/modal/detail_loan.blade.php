<div class="modal fade" id="showDetailLoanModal{{ $loan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="detailLabel">
                    <i class="fas fa-file-alt me-2"></i> Detail Transaksi
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6 border-end">
                        <h5 class="text-primary mb-3"><i class="fas fa-user-circle"></i> Data Peminjam</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Nama Peminjam</label>
                            <input type="text" class="form-control bg-light" value="{{ $loan->user->name ?? '-' }}"
                                readonly />
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Email</label>
                            <input type="text" class="form-control bg-light" value="{{ $loan->user->email ?? '-' }}"
                                readonly />
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Kontak</label>
                            <input type="text" class="form-control bg-light"
                                value="{{ $loan->user->phone_number ?? '-' }}" readonly />
                        </div>


                    </div>

                    {{-- DATA PINJAMAN --}}
                    <div class="col-md-6">
                        <h5 class="text-success mb-3"><i class="fas fa-box"></i> Data Pinjaman</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Nama Barang</label>
                            <input type="text" class="form-control bg-light"
                                value="{{ $loan->inventory->name ?? '-' }}" readonly />
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Tgl Pinjam</label>
                                <input type="text" class="form-control bg-light"
                                    value="{{ $loan->loan_date->translatedFormat('d F Y') }}" readonly />
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Rencana Kembali</label>
                                <input type="text" class="form-control bg-light"
                                    value="{{ $loan->due_date->translatedFormat('d F Y') }}" readonly />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control bg-light" value="{{ $loan->status_label }}"
                                    readonly />
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold small text-muted">Peminjaman Disetujui</label>
                                <input type="text" class="form-control bg-light"
                                    value="{{ $loan->approvedBy->name ?? '-' }}" readonly />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Total Denda</label>
                                <input type="text" class="form-control bg-light"
                                    value="Rp {{ number_format($loan->calculateFine()) }}" readonly />
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Total Denda</label>
                                    <input type="text" class="form-control bg-light"
                                        value="Rp {{ number_format($loan->calculateFine()) }}" readonly />
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold small text-muted">Tgl Bayar Denda</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $loan->fine_paid_at->translatedFormat('d F Y') ?? '-' }}" readonly />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold small text-muted">Tgl Kembali</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $loan->returned_date->translatedFormat('d F Y') ?? '-' }}"
                                        readonly />
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-bold small text-muted">Pengembalian Disetujui</label>
                                    <input type="text" class="form-control bg-light"
                                        value="{{ $loan->receivedBy->name ?? '-' }}" readonly />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

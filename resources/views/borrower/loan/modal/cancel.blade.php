{{-- Modal konfirmasi untuk menghapus data administrator --}}
<div class="modal fade" id="cancelLoanModal{{ $loan->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-4 shadow-lg border-0 overflow-hidden">

            {{-- Form hapus administrator (DELETE request) --}}
            <form method="POST" action="{{ route('borrower.loan.cancel', $loan->id) }}">
                @csrf
                @method('PATCH')

                <div class="modal-body p-5 text-center position-relative">

                    <button type="button" class="btn-close position-absolute top-0 end-0 m-4" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    {{-- Indikator visual bahwa ini aksi destruktif --}}
                    <div
                        class="d-inline-flex align-items-center justify-content-center bg-danger-subtle text-danger rounded-circle mb-4 p-4">
                        <i class="fas fa-trash-alt fa-3x"></i>
                    </div>

                    <h3 class="fw-bold mb-3 text-dark">Batalkan Peminjaman?</h3>

                    <p class="text-muted fs-4 mb-4">
                        Kamu akan membatalkan data peminjaman ini. <br>
                        Aksi ini tidak bisa dibatalkan.
                    </p>


                    {{-- Informasi data yang akan dihapus sebagai validasi visual --}}
                    <div class="bg-light rounded-3 p-3 mb-4 border border-light-subtle">
                        <span class="text-muted small d-block mb-1">Data yang akan dibatalkan:</span>
                        <span class="fw-bold text-dark fs-5">{{ $loan->device->name }}</span>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <button type="button"
                            class="btn btn-secondary btn-lg rounded-pill px-5 fw-semibold text-light me-md-2"
                            data-bs-dismiss="modal">
                            Kembali
                        </button>

                        {{-- Submit form untuk eksekusi penghapusan --}}
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5 fw-semibold shadow-sm">
                            Ya, Batalkan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- File JS khusus halaman administrator -->

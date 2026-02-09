<div class="modal fade" id="editLoanModal{{ $loan->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Data Pinjaman
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- FORM --}}
            <form action="{{ route('admin.loan.update', $loan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    {{-- INFORMASI PEMINJAMAN --}}
                    <h6 class="text-primary mb-3">Informasi Peminjaman</h6>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Peminjam</label>

                            <input type="text" class="form-control" value="{{ $loan->user->name }}" readonly>

                            <input type="hidden" name="user_id" value="{{ $loan->user_id }}">
                        </div>


                        {{-- INVENTORY --}}
                        <div class="col-md-6">
                            <label for="device_id_{{ $loan->id }}" class="form-label fw-bold">
                                Perangkat
                            </label>
                            <select class="form-select" name="device_id" id="device_id_{{ $loan->id }}"
                                required>
                                @foreach ($devices as $device)
                                    @if ($device->stock > 0 || $loan->inventory_id == $device->id)
                                        <option value="{{ $device->id }}"
                                            {{ old('device_id', $loan->device_id) == $device->id ? 'selected' : '' }}>
                                            {{ $device->name }} — Stok: {{ $device->stock }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- JADWAL --}}
                    <h6 class="text-primary mb-3">Jadwal Peminjaman</h6>
                    <div class="row g-3">

                        {{-- TANGGAL PINJAM --}}
                        <div class="col-md-6">
                            <label for="loan_date_{{ $loan->id }}" class="form-label fw-bold">
                                Tanggal Pinjam
                            </label>
                            <input type="date" class="form-control" name="loan_date"
                                id="loan_date_{{ $loan->id }}"
                                value="{{ old('loan_date', $loan->loan_date->format('Y-m-d')) }}" required>
                        </div>

                        {{-- TANGGAL KEMBALI --}}
                        <div class="col-md-6">
                            <label for="due_date_{{ $loan->id }}" class="form-label fw-bold">
                                Rencana Kembali
                            </label>
                            <input type="date" class="form-control" name="due_date"
                                id="due_date_{{ $loan->id }}"
                                value="{{ old('due_date', $loan->due_date->format('Y-m-d')) }}" required>
                        </div>

                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-door-closed"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

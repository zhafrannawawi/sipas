{{-- Modal edit inventaris --}}
<div class="modal fade" id="editInventoryModal{{ $device->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Form update inventory --}}
            <form action="{{ route('admin.device.update', $device->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Perangkat</label>
                        <input type="text" class="form-control" name="name" value="{{ $device->name }}">
                    </div>

                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kode</label>
                                <input type="text" class="form-control" name="code"
                                    value="{{ $device->code }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $device->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Sewa / Hari</label>
                        <input type="number" class="form-control" name="price_per_day"
                            value="{{ $device->price_per_day }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="description" value="{{ $device->description }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" name="stock" placeholder="0" min="0"
                            value="{{ $device->stock }}" required>
                    </div>

                </div>

                <!-- Footer modal: aksi pengguna -->
                <div class="modal-footer">

                    <!-- Menutup modal tanpa menyimpan -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-door-closed me-1"></i> Kembali
                    </button>

                    <!-- Submit form ke server -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

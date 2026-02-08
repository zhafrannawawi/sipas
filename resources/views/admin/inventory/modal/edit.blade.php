{{-- Modal edit inventaris --}}
<div class="modal fade" id="editInventoryModal{{ $inventory->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Form update inventory --}}
            <form action="{{ route('admin.inventory.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" class="form-control" name="name" value="{{ $inventory->name }}">
                    </div>

                    <div class="row g-2">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" name="unique_code"
                                    value="{{ $inventory->unique_code }}">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Kategori Alat</label>
                                <select class="form-select" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $inventory->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" name="stock" min="0"
                            value="{{ $inventory->stock }}" required>
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

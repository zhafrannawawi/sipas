{{-- Modal tambah inventaris --}}
<div class="modal fade" id="createInventoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Form create inventory --}}
            <form action="{{ route('admin.inventory.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" class="form-control" name="name" placeholder="Proyektor">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="unique_code" placeholder="PRY-001">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Alat</label>
                        <select class="form-select" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Barang</label>
                        <input type="number" class="form-control" name="stock" placeholder="0" min="0"
                            required>
                    </div>

                </div>

                {{-- Footer modal: aksi pengguna --}}
                <div class="modal-footer">

                    {{-- Menutup modal tanpa menyimpan  --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-door-closed me-1"></i> Kembali
                    </button>

                    {{-- Submit form ke server  --}}
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

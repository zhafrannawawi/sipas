<x-layout>

    {{-- Judul halaman --}}
    <x-slot:title>
        Kategori
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Kategori</h3>
            <small class="text-muted">Manajemen kategori alat</small>
        </div>
    </div>

    <div class="card shadow-sm">

        {{-- Header tabel + trigger modal create --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Kategori</h5>

            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createCategoryModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Kategori
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data kategori --}}
                        @foreach ($categories as $category)
                            <tr>
                                {{-- Nomor urut mengikuti pagination --}}
                                <td>
                                    {{ $categories->firstItem() + $loop->index }}
                                </td>

                                <td>{{ $category->name }}</td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editCategoryModal{{ $category->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategoryModal{{ $category->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal edit & delete per kategori --}}
                            @include('admin.category.modal.edit')
                            @include('admin.category.modal.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $categories->links() }}
        </div>
    </div>

</x-layout>

{{-- Modal create kategori --}}
@include('admin.category.modal.create')

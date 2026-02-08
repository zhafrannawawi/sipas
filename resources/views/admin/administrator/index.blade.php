<x-layout>

    <x-slot:title>
        Administrator
    </x-slot:title>

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Kelola Data Administrator</h3>
            <small class="text-muted">Manajemen data administrator</small>
        </div>
    </div>

    <x-alert></x-alert>

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Administrator</h5>

            <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal"
                data-bs-target="#createAdministratorModal">
                <i class="fas fa-plus-circle me-1"></i>
                Tambah Administrator
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-start">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrators as $administrator)
                            <tr>
                                <td scope="row">
                                    {{ $administrators->firstItem() + $loop->index }}
                                </td>
                                <td class="fw-bold text-start">{{ $administrator->email }}</td>
                                <td>{{ $administrator->name }}</td>
                                <td>{{ $administrator->phone_number }}</td>


                                {{-- Aksi --}}
                                <td>

                                    {{-- Button Edit --}}
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editAdministratorModal{{ $administrator->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Button Delete --}}
                                    <a name="" id="" class="btn btn-danger btn-sm" href=""
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteAdministratorModal{{ $administrator->id }}"
                                        role="button"><i class="fas fa-trash    "></i>
                                    </a>

                                </td>

                            </tr>
                            @include('admin.administrator.modal.delete')
                            @include('admin.administrator.modal.edit', ['administrator' => $administrator])
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            {{ $administrators->links() }}
        </div>
    </div>


    @include('admin.administrator.modal.create')

</x-layout>

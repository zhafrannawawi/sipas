<x-layout>

    {{-- Judul halaman --}}
    <x-slot:title>
        Log Aktivitas
    </x-slot:title>

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Log Aktivitas</h3>
            <small class="text-muted">Memantau log aktivitas</small>
        </div>
    </div>

    <div class="card shadow-sm">

        {{-- Header tabel + trigger modal create --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Log Aktivitas</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Aksi</th>
                            <th>Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data kategori --}}
                        @foreach ($ActivityLogs as $activityLog)
                            <tr>
                                {{-- Nomor urut mengikuti pagination --}}
                                <td>
                                    {{ $ActivityLogs->firstItem() + $loop->index }}
                                </td>

                                <td>{{ $activityLog->user->name }}</td>
                                <td>{{ $activityLog->action }}</td>
                                <td>{{ $activityLog->activity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{ $ActivityLogs->links() }}
        </div>
    </div>

</x-layout>

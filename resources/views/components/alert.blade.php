@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 60px; right: 20px; z-index: 9999; min-width: 400px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> <i class="fas fa-check-circle"></i> {{ session('success') }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert"
        style="position: fixed; top: 60px; right: 20px; z-index: 9999; min-width: 400px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> <i class="fas fa-exclamation-circle    "></i> {{ session('error') }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert"
        style="position: fixed; top: 60px; right: 20px; z-index: 9999; min-width: 400px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <strong>Gagal!</strong>
        {{ $errors->first() }}
        <i class="fas fa-circle-exclamation me-2"></i>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

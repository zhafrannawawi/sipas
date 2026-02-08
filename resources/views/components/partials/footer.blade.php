<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(element) {
            // Gunakan getOrCreateInstance agar tidak bentrok
            var bsAlert = bootstrap.Alert.getOrCreateInstance(element);

            if (element) {
                setTimeout(function() {
                    bsAlert.close();
                }, 5000);
            }
        });
    });
</script>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons/fontawesome.css') }}">
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <x-sidebar></x-sidebar>

        <div class="body-wrapper">
            <x-header></x-header>

            <main class="container-fluid">
                {{ $slot }}
            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>

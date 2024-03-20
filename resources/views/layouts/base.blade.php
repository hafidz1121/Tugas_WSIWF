<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tugas WSIWF</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                    <x-sidebar></x-sidebar>
                </div>
                <div class="col-md-10">
                    <div class="p-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dashboardLink = document.getElementById('dashboard-link');
        var dataUserLink = document.getElementById('data-user-link');

        var currentRoute = "{{ request()->route()->getName() }}";

        if (currentRoute === 'dashboard') {
            dashboardLink.classList.add('active');
        } else if (currentRoute === 'user' || currentRoute === 'user.store' || currentRoute === 'user.edit') {
            dataUserLink.classList.add('active');
        }
    });

    $(document).ready( function () {
        $('#myTable').DataTable({
            ordering: false,
            paging: false
        });
    });
</script>
</html>

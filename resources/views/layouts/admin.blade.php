<!doctype html>
<html lang="en" data-bs-theme="bordered-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Alumni</title>
    <!--favicon-->
    <!-- <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png"> -->
    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sass/responsive.css') }}" rel="stylesheet">

</head>

<body>

    <!--start header-->
    @include('layouts.admin.navbar')
    <!--end top header-->

    <!--start sidebar-->
    @include('layouts.admin.sidebar')
    <!--end sidebar-->

    <!--start main wrapper-->
    @yield('content')
    <!--end main wrapper-->

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    <!--start footer-->
    @include('layouts.admin.footer')
    <!--end footer-->

</body>

<!--bootstrap js-->
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

<!--plugins-->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/plugins/peity/jquery.peity.min.js') }}"></script>
<script>
    $(".data-attributes span").peity("donut")
</script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/js/dashboard1.js') }}"></script>
<script>
    new PerfectScrollbar(".user-list")
</script>

<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatable/js/data-table.js') }}"></script>
<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<!-- Datatable Buttons -->
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<style>
    /* Search ke kanan */
    div.dataTables_filter {
        text-align: right !important;
        margin-bottom: 5px;
    }

    /* Info entries di kiri, pagination di kanan */
    div.dataTables_info {
        float: left;
    }

    div.dataTables_paginate {
        float: right;
    }
</style>

<style>
    /* Tambah tombol export jadi inline-block dan float kanan */
    div.dt-buttons {
        float: right;
        margin-top: -0px; /* sesuaikan tinggi biar sejajar */
    }

    .tombol-tambah {
        float: left;
        margin-bottom: 10px;
    }
</style>

</html>
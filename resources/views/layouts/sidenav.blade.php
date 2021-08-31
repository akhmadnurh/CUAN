<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="./css/sidenav-style.css">
    <link rel="stylesheet" href="./css/dash-style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-person-circle"></i>
                    User</a>
                <button class="btn btn-toogle" type="button" onclick="openNav()">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </nav>

    <div id="mySidebar" class="sidebar">
        <a href="/">Dashboard</a>
        <a href="#">Hutang Piutang</a>
        <a href="#">Pengaturan</a>
        <a href="#">Riwayat</a>
        <a href="{{ url('logout') }}">Logout</a>
    </div>

    <div id="main" class="main">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="./js/sidenav.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script> --}}
</body>

</html>

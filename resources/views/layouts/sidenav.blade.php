<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
    <link rel="stylesheet" href="./css/sidenav-style.css">
    <link rel="stylesheet" href="./css/dash-style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid container">
            <a class="navbar-brand" href="/">CUAN</a>
            <form class="d-flex">

                <div class="btn-group">
                    <a class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                        aria-current="page" href="#">
                        <i class="bi bi-person-circle"></i>
                        User
                    </a>
                    {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start"
                        aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul> --}}
                    <div class="dropdown-menu p-4 text-muted dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="word-wrap:break-word;max-width: 200px;">
                        <p>
                            <i class="bi bi-person-circle"></i>
                            User
                        </p>
                        <p>user@gmail.com</p>
                        <p>09302194843242</p>
                        <a href="#" class="btn btn-primary">edit</a>
                    </div>
                </div>
                <button class="btn btn-toogle" type="button" onclick="openNav()">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </form>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "showing": false,
                "paging": false,
                "searching": false,
                "info": false
            });
            $('#riwayat').DataTable();
        });

    </script>


</body>

</html>

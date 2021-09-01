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
            <div class="d-flex">
                <a class="navbar-brand" href="/">CUAN</a>
                <button class="btn btn-toogle" type="button" onclick="openNav()">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <form class="d-flex">
                <div class="btn-group">
                    <a type="button" class="nav-link" data-bs-toggle="dropdown" data-bs-display="static"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        {{ session()->get('firstname') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-center p-3">
                        <li>
                            <i class="fs-3 bi-person-circle"></i>
                            <p>
                                {{ session()->get('firstname').' '.session()->get('lastname') }}
                                <br>
                                {{ session()->get('email') }}</p>
                            <a href="{{ url('edit-profile') }}" class="btn btn-primary btn-sm">Edit</a>
                        </li>
                    </ul>
                </div>

            </form>

        </div>
    </nav>

    <div id="mySidebar" class="sidebar">
        <a href="/">Dashboard</a>
        <a href="#">Hutang Piutang</a>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <p class="accordion-header" id="panelsStayOpen-headingOne">
                <a type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Pengaturan
                    <i class="bi bi-chevron-compact-down logdrop"></i>
                </a>

            </p>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="dropside">
                    <a href="{{  url('edit-profile') }}">Edit Profile</a>
                    <a href="#">Edit Kategori</a>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <p class="accordion-header" id="panelsStayOpen-headingOne">
                <a type="button" data-bs-toggle="collapse" data-bs-target="#panels" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    Riwayat
                    <i class="bi bi-chevron-compact-down logdropp"></i>
                </a>
            </p>
            <div id="panels" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="dropside">
                    <a href="{{ url('outgoing-transactions') }}">Transaksi Keluar</a>
                    <a href="{{ url('incoming-transactions') }}">Transaksi Masuk</a>
                    <a href="#">Hutang</a>
                    <a href="#">Piutang</a>
                </div>
            </div>
        </div>
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

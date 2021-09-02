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
                <button class="btn" type="button" onclick="openNav()">
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
        <a href="/" class="list-side link-side"><i class="bi bi-speedometer icon-side"></i>Dashboard</a>
        <a href="#" class="list-side link-side"><i class="bi bi-cash-coin icon-side"></i>Hutang Piutang</a>
        <div class="accordion list-side" id="accordionPanelsStayOpenExample">
            <p class="accordion-header" id="panelsStayOpen-headingOne">
                <a type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <i class="bi bi-sliders icon-side"></i>Pengaturan
                    <i class="bi bi-chevron-compact-down logdrop"></i>
                </a>

            </p>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="dropside">
                    <a href="{{  url('edit-profile') }}" class="link-side">Edit Profile</a>
                    <a href="{{ url('categories') }}" class="link-side">Edit Kategori</a>
                </div>
            </div>
        </div>
        <div class="accordion list-side" id="accordionPanelsStayOpenExample">
            <p class="accordion-header" id="panelsStayOpen-headingOne">
                <a type="button" data-bs-toggle="collapse" data-bs-target="#panels" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    <i class="bi bi-clock-history icon-side"></i>Riwayat
                    <i class="bi bi-chevron-compact-down logdrop"></i>
                </a>
            </p>
            <div id="panels" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="dropside">
                    <a href="{{ url('outgoing-transactions') }}" class="link-side">Transaksi Keluar</a>
                    <a href="{{ url('incoming-transactions') }}" class="link-side">Transaksi Masuk</a>
                    <a href="{{ url('debts') }}" class="link-side">Transaksi Hutang</a>
                    <a href="{{ url('credits') }}" class="link-side">Transaksi Piutang</a>
                </div>
            </div>
        </div>
        <a class="list-side" id="logout" type="submit"><i class="bi bi-box-arrow-right icon-side"></i>Logout</a>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "showing": false,
                "paging": false,
                "searching": false,
                "info": false
            });
            $('#riwayat').DataTable();
            $('#kategori').DataTable({
                "showing": false,
                "paging": false,
                "info": false
            })

            $('#hutangPiutang').DataTable()

            var path = window.location.href;
            $('.link-side').each(function () {
                if (this.href === path) {
                    $(this).addClass('active');
                }
            });

            $('.active').parentsUntil(['.accordion-collapse']).addClass('show');

            $("#logout").on("click", function () {
                Swal.fire({
                    title: 'Kamu Yakin?',
                    text: "Kamu Akan Keluar Dari Akun",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4F8CB8',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, saya keluar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Kamu akan keluar',
                            showConfirmButton: false,
                        })
                        window.location.href = "{{ url('logout') }}";
                    }
                })
            })
        });

    </script>


</body>

</html>

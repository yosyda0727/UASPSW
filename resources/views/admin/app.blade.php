<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .nav-pills li a:hover {
            background-color: blue;
        }

        .sidebar {
            transition: width 0.7s ease;
        }

        .sidebar-collapsed .nav-link span {
            display: none;
        }

        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-expanded {
            width: 250px;
        }

        .sidebar-toggle {
            cursor: pointer;
        }
    </style>
    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div id="sidebar"
                class="sidebar bg-dark col-auto col-md-3 col-lg-2 min-vh-100 d-flex flex-column justify-content-between sidebar-expanded">
                <div class="bg-dark p-2">
                    <div class="d-flex justify-content-between align-items-center text-white">
                        <i class="fas fa-bars sidebar-toggle"></i>
                    </div>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="{{ route('admin.home') }}" class="nav-link text-white">
                                <i class="fs-5 fa fa-home"></i>
                                <span class="fs-4 ms-1">dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="{{ Route('admin.product.index') }}" class="nav-link text-white">
                                <i class="bi bi-collection"></i>
                                <span class="fs-4 ms-1">Lapangan</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="{{ Route('admin.booking.index') }}" class="nav-link text-white">
                                <i class="fa fa-list"></i>
                                <span class="fs-4 ms-1">list booking</span>
                            </a>
                        </li>
                        <li>
                            <div class="d-flex">
                                @auth
                                    <div class="dropdown nav-item">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item btn btn-danger"
                                                    href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/de96388a63.js" crossorigin="anonymous"></script>
    <script>
        document.querySelector(".sidebar-toggle").addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("sidebar-collapsed");
            sidebar.classList.toggle("sidebar-expanded");
        });
    </script>
</body>

</html>
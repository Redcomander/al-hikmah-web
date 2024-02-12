<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Modern Al-Hikmah Utan</title>
    <!-- CSS LINK -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> --}}
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Style -->
    <style>
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .nav-bg-color {
            background-color: rgba(16, 141, 141, 1);
        }

        .nav-item .nav-link:hover {
            position: relative;
        }

        html,
        body {
            overflow-x: hidden;
        }

        .nav-item .nav-link:hover::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: lightgray;
        }

        .active-link {
            background-color: rgba(16, 141, 141, 1);
            /* Change the background color */
            color: white;
            /* Change the text color */
            position: relative;
        }

        .active-link::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: lightgray;
        }

        .button-64 {
            align-items: center;
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: flex;
            font-family: Phantomsans, sans-serif;
            font-size: 20px;
            justify-content: center;
            line-height: 1em;
            max-width: 100%;
            min-width: 140px;
            padding: 3px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
        }

        .button-64:active,
        .button-64:hover {
            outline: 0;
        }

        .button-64 span {
            background-color: rgb(5, 6, 45);
            padding: 16px 24px;
            border-radius: 6px;
            width: 100%;
            height: 100%;
            transition: 300ms;
        }

        .button-64:hover span {
            background: none;
        }

        main {
            margin-top: 120px;
            /* Adjust the value based on your navigation bar height */
        }

        @media (min-width: 768px) {
            .button-64 {
                font-size: 24px;
                min-width: 196px;
            }
        }

        #myCarousel {
            margin-top: 0;
            padding-top: 0;
        }

        .custom-accordion-item {
            background-color: rgba(16, 141, 141, 1);
        }

        /* Add this style to set the text color for accordion buttons */
        .custom-accordion-button {
            color: rgba(16, 141, 141, 1);
            /* Set text color to white or any color that provides good contrast */
        }
    </style>
</head>

<body style="min-height: 100vh; display: flex; flex-direction: column;">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark nav-bg-color mb-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ '/' }}">
                <img class="logo-img img-fluid" style="max-width: 50%;" src="{{ asset('logo.png') }}" alt="Logo" />
            </a>
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarButtonsExample">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active-link' : '' }}" href="/">Beranda</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('gallery') ? 'active-link' : '' }}"
                            href="{{ url('/gallery') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pendaftarandepan', 'pendaftaran/create') ? 'active-link' : '' }}"
                            href="{{ route('pendaftarandepan') }}">Pendaftaran</a>
                    </li>
                    <li class="nav-item d-none d-md-inline">
                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#"
                            id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            Lembaga
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item"
                                    href="{{ route('showByCategory', 'Pengasuhan') }}">Pengasuhan</a></li>
                            <li><a class="dropdown-item" href="{{ route('showByCategory', 'KMI') }}">KMI</a></li>
                            <li><a class="dropdown-item" href="{{ route('showByCategory', 'Pramuka') }}">Pramuka</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('showByCategory', 'OPPH') }}">OPPH</a></li>
                            <li><a class="dropdown-item" href="{{ route('showByCategory', 'TPQ') }}">TPQ</a></li>
                        </ul>
                    </li>

                    <!-- Accordion for mobile view -->
                    <div class="accordion accordion-flush d-md-none mb-3 custom-accordion-item"
                        id="accordionFlushExample">
                        <div class="accordion-item custom-accordion-item">
                            <h2 class="accordion-header" id="flush-headingPengasuhan">
                                <button data-mdb-collapse-init
                                    class="accordion-button collapsed custom-accordion-item text-white" type="button"
                                    data-mdb-toggle="collapse" data-mdb-target="#flush-collapsePengasuhan"
                                    aria-expanded="false" aria-controls="flush-collapsePengasuhan">
                                    Lembaga
                                </button>
                            </h2>
                            <div id="flush-collapsePengasuhan" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingPengasuhan" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <!-- Content for Pengasuhan -->
                                    <a class="dropdown-item text-white"
                                        href="{{ route('showByCategory', 'Pengasuhan') }}">Pengasuhan</a>
                                </div>
                            </div>
                            <div id="flush-collapsePengasuhan" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingPengasuhan" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">
                                    <!-- Content for Pengasuhan -->
                                    <a class="dropdown-item" href="{{ route('showByCategory', 'KMI') }}">KMI</a>
                                </div>
                            </div>
                            <div id="flush-collapsePengasuhan" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingPengasuhan" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">
                                    <!-- Content for Pengasuhan -->
                                    <a class="dropdown-item"
                                        href="{{ route('showByCategory', 'Pramuka') }}">Pramuka</a>
                                </div>
                            </div>
                            <div id="flush-collapsePengasuhan" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingPengasuhan" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">
                                    <!-- Content for Pengasuhan -->
                                    <a class="dropdown-item" href="{{ route('showByCategory', 'OPPH') }}">OPPH</a>
                                </div>
                            </div>
                            <div id="flush-collapsePengasuhan" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingPengasuhan" data-mdb-parent="#accordionFlushExample">
                                <div class="accordion-body text-white">
                                    <!-- Content for Pengasuhan -->
                                    <a class="dropdown-item" href="{{ route('showByCategory', 'TPQ') }}">TPQ</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Informasi</a>
                    </li> --}}
                </ul>
                <div class="d-flex align-items-center">
                    @auth

                        <!-- Display Login and Register buttons for guests (not authenticated users) -->
                        <div class="dropdown d-none d-md-block">
                            <a data-mdb-dropdown-init class="nav-link dropdown-toggle d-flex align-items-center"
                                href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                                <img src="{{ asset('storage/' . Auth::user()->foto_guru) }}" class="rounded-circle"
                                    height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuAvatar">
                                {{-- <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li> --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        {{-- Accordion Mobile View --}}

                        <div class="accordion accordion-flush d-md-none mb-3 custom-accordion-item" id="AvatarAccordion">
                            <div class="accordion-item custom-accordion-item">
                                <h2 class="accordion-header" id="flush-HeaderAvatar">
                                    <button data-mdb-collapse-init
                                        class="accordion-button collapsed custom-accordion-item text-white" type="button"
                                        data-mdb-toggle="collapse" data-mdb-target="#flush-AvatarAccordion"
                                        aria-expanded="false" aria-controls="flush-AvatarAccordion">
                                        <img src="{{ asset('storage/' . Auth::user()->foto_guru) }}"
                                            class="rounded-circle" height="25" alt="Black and White Portrait of a Man"
                                            loading="lazy" />
                                    </button>
                                </h2>
                                <div id="flush-AvatarAccordion" class="accordion-collapse collapse"
                                    aria-labelledby="flush-HeaderAvatar" data-mdb-parent="#AvatarAccordion">
                                    <div class="accordion-body">
                                        <!-- Content for Pengasuhan -->
                                        <a class="dropdown-item text-white" href="{{ route('dashboard') }}">Dashboard</a>
                                    </div>
                                </div>
                                <div id="flush-AvatarAccordion" class="accordion-collapse collapse"
                                    aria-labelledby="flush-HeaderAvatar" data-mdb-parent="#AvatarAccordion">
                                    <div class="accordion-body text-white">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Repeat similar code for Pramuka, OPPH, and TPQ -->
                        </div>
                    @else
                        <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main style="flex-grow: 1;">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: rgba(16, 141, 141, 1)">
            <!-- Left -->
            <div class="me-5">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="https://web.facebook.com/ponpes.alhikmahutan?locale=id_ID" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/ponpes_alhikmah.utan/" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@Alhikmahutan" class="text-white me-4">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section>
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Pondok Modern Al-Hikmah</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            Jl. Lintas Sumbawa - Tano, Dusun Bina Marga,
                            Desa Stowe Brang, Kecamatan Utan, Kabupaten Sumbawa,
                            Provinsi Nusa Tenggara Barat 84352.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Navigasi</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="/" class="text-white">Beranda</a>
                        </p>
                        <p>
                            <a href="{{ route('gallery.index') }}" class="text-white">Galeri</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Informasi</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Kontak</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p><i class="bi bi-whatsapp"></i> 085237563046</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            Copyright © All rights reserved. | Al-Hikmah ITTC, made by celcious team
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>

    <script>
        AOS.init();
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script type="module">
        // Initialization for ES Users
        import {
            Dropdown,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Dropdown
        });
    </script>
    <script>
        // Check the screen width on page load
        function checkScreenWidth() {
            if (window.innerWidth < 768) {
                // Mobile view: Initialize Accordion
                $('.nav-link').removeAttr('data-mdb-toggle');
                $('.dropdown-menu').addClass('collapse');
                $('.accordion').removeClass('d-none');
            } else {
                // Desktop view: Remove Accordion initialization
                $('.nav-link').attr('data-mdb-toggle', 'dropdown');
                $('.dropdown-menu').removeClass('collapse');
                $('.accordion').addClass('d-none');
            }
        }

        // Check the screen width when the page loads
        checkScreenWidth();

        // Check the screen width when the window is resized
        window.addEventListener('resize', function() {
            checkScreenWidth();
        });
    </script>
</body>

</html>

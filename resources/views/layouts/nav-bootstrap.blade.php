<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap.icon.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font1|Font2|Font3&display=swap"> --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>

    <script src="{{ asset('bootstrap.bundle.js') }}"></script>

    <!-- Include jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="
https://cdn.jsdelivr.net/npm/cropperjs@1.6.1/dist/cropper.min.css
" rel="stylesheet">


    <style>
        body {
            background-color: #fbfbfb;
        }


        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }


        }

        @media (max-width: 500px) {
            #avatar {
                visibility: hidden;
            }

            #logout-btn {
                visibility: hidden;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        /* .sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
} */

        .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>

</head>

<body>
    <!--Main Navigation-->
    <header>

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-2 mt-5">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link list-group-item list-group-item-action py-2 ripple {{ Request::is('dashboard') ? 'active' : '' }}"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-2"></i><span>Main Dashboard</span>
                    </a>
                    <a href="{{ url('/article') }}"
                        class="list-group-item list-group-item-action py-2 ripple {{ Request::is('article*') ? 'active' : '' }}">
                        <i class="fas fa-file-lines me-2"></i><span>Article</span>
                    </a>
                    <a href="{{ url('/student') }}"
                        class="list-group-item list-group-item-action py-2 ripple {{ Request::is('student*') ? 'active' : '' }}"><i
                            class="fas fa-user me-2"></i><span>Student</span></a>
                    <a href="{{ url('/teacher') }}"
                        class="list-group-item list-group-item-action py-2 ripple {{ Request::is('teacher*') ? 'active' : '' }}"><i
                            class="fas fa-book-open-reader me-2"></i><span>Teacher Account</span></a>
                    <a href="#" class="list-group-item justify-center list-group-item-action py-2 ripple">
                        <i class="fas fa-chalkboard-user me-1"></i><span>Management Ujian (Coming Soon)</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="far fa-calendar-days me-2"></i><span>Kalender Akademik (Coming Soon)</span></a>
                    <div class="list-group list-group-flush mx-2">
                        <a class="list-group-item py-2 ripple">
                            <strong>
                                <i class="fa-solid fa-book"></i> Pendaftaran
                            </strong>
                        </a>
                        <!-- Normal list items again -->
                        <a href="{{ url('/pendaftaran') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Request::is('pendaftaran') ? 'active' : '' }}">
                            <i class="fas fa-some-icon me-2"></i><span>Daftar Pendaftaran</span>
                        </a>
                        </a>
                        <a href="{{ route('pendaftaran.verify') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Request::is('pendaftaran/verify*') ? 'active' : '' }}">
                            <i class="fas fa-some-icon me-2"></i><span>Terverifikasi</span>
                        </a>

                        <a href="{{ route('pendaftaran.unverify') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Request::is('pendaftaran/unverify*') ? 'active' : '' }}">
                            <i class="fas fa-some-icon me-2"></i><span>Belum Terverifikasi</span>
                        </a>

                    </div>

                </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="{{ '/' }}">
                    <img src="logo2.png" height="60" alt="" loading="lazy" />
                </a>

                <!-- Navbar links -->
                <div class="navbar-collapse d-none" id="navbarNav">
                    <div id="nav-avatar" class="d-flex flex-row align-items-center ms-auto">
                        <!-- Avatar -->
                        <div id="avatar" class="d-flex flex-row align-items-center me-3">
                            <div class="cropper-container me-3"
                                style="width: 30px; height: 30px; overflow: hidden; border-radius: 50%;">
                                <img id="avatar-image" src="{{ asset('storage/' . Auth::user()->foto_guru) }}"
                                    class="cropper-image rounded-circle" alt="" loading="lazy" />
                            </div>
                            <div class="d-flex flex-column align-items-left">
                                <p class="m-0">{{ Auth::user()->name }}</p>
                                <p class="m-0"><b>{{ Auth::user()->grade_1 }}</b></p>
                            </div>
                        </div>


                        <!-- Logout button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button id="logout-btn" class="btn btn-danger" type="submit">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 80px">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.1/dist/cropper.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Cropper
            var cropper;

            // Handle the image click event
            $("#avatar-image").click(function() {
                // Show the modal
                $('#cropperModal').modal('show');

                // Set the image source for cropper
                cropper = new Cropper(document.getElementById('cropperImage'), {
                    aspectRatio: 1, // Set your desired aspect ratio
                    viewMode: 1, // Set the view mode to restrict the cropped area to the container
                });
            });

            // Handle the modal close event
            $('#cropperModal').on('hidden.bs.modal', function() {
                // Destroy the cropper instance when the modal is closed
                cropper.destroy();
            });

            // Handle the Save button click in the modal
            $('#saveCrop').click(function() {
                // Get the cropped image data
                var croppedData = cropper.getCroppedCanvas().toDataURL();

                // Update the avatar image
                $('#avatar-image').attr('src', croppedData);

                // Close the modal
                $('#cropperModal').modal('hide');
            });
        });
    </script>

    <!-- Cropper Modal -->
    <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="cropperModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropperModalLabel">Edit Avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="cropperImage" src="{{ asset('storage/' . Auth::user()->foto_guru) }}" alt="Crop Image"
                        style="max-width: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="saveCrop" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Cropper Modal -->
</body>

</html>

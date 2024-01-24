@extends('layouts.nav-bootstrap')

@section('content')
    <style>
        /* Custom styles for the table */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .custom-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Custom styles for the Edit and Delete buttons */
        .btn-edit {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-delete {
            background-color: #c82333;
            color: #fff;
        }

        /* Hover styles for the buttons */
        .btn-edit:hover {
            background-color: #138496;
        }

        .btn-delete:hover {
            background-color: #b51927;
        }

        /* Style for the icons inside the buttons */
        .btn i {
            font-size: 1rem;
        }

        /* Custom styles for the modal */
        .custom-modal .modal-dialog {
            max-width: 800px;
        }

        .custom-modal .modal-content {
            border-radius: 10px;
            border: none;
        }

        .custom-modal .modal-header {
            background-color: #000000;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .custom-modal .modal-title {
            font-size: 24px;
        }

        .custom-modal .modal-body {
            padding: 20px;
        }

        .custom-modal .modal-footer {
            border-radius: 0 0 10px 10px;
        }

        /* Fade-in animation for the modal */
        .custom-modal .modal.fade .modal-dialog {
            transform: translate(0, -50%);
        }

        .custom-modal .modal.fade.show .modal-dialog {
            transform: translate(0, 0);
        }

        /* Limit image size within the modal */
        .custom-modal img {
            height: auto;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="lead" style="color: #000000;">
                                <b> DATA SANTRI </b>
                            </h4>
                            <a href="{{ url('student/create') }}" class="btn btn-dark mb-3">
                                <i class="bi bi-plus"></i> Baru
                            </a>
                        </div>
                        {{-- Table --}}
                        @livewire('student-index')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            if (window.confirm("Are you sure you want to delete this item?")) {
                // If the user clicks "OK", submit the form
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
@endsection

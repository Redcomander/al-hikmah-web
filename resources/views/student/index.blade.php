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
                        <div class="d-flex justify-content-between">
                            <h4 class="lead" style="color: #000000;">
                                <b> DATA SANTRI </b>
                            </h4>
                            <a href="{{ url('student/create') }}" class="btn btn-dark mb-3">
                                <i class="bi bi-plus"></i> Baru
                            </a>
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nomor Induk</th>
                                        <th>NISN</th>
                                        <th scope="col" class="col-6">Nama Lengkap</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1; // Initialize the counter
                                    @endphp

                                    @forelse ($student as $col)
                                        <tr class="align-middle">
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $col->no_induk }}</td>
                                            <td>{{ $col->nisn }}</td>
                                            <td>{{ $col->nama_lengkap }}</td>
                                            <td>
                                                <a href="{{ url('student/' . $col->id . '/edit') }}" class="btn btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ url('student/' . $col->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-mdb-ripple-init
                                                    data-mdb-modal-init data-mdb-target="#previewModal{{ $col->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade custom-modal" id="previewModal{{ $col->id }}"
                                            tabindex="-1" aria-labelledby="previewModalLabel{{ $col->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="previewModalLabel{{ $col->id }}"
                                                            style="color: #ffffff;">Detail Santri</h5>
                                                        <button type="button" class="btn-close btn-white"
                                                            data-mdb-ripple-init data-mdb-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <!-- Image on the right side -->

                                                            <!-- Other content on the left side -->
                                                            <div class="col-md-6">
                                                                <p><strong>Nomor Induk:</strong> {{ $col->no_induk }}</p>
                                                                <p><strong>NISN:</strong> {{ $col->nisn }}</p>
                                                                <p><strong>Nama Lengkap:</strong> {{ $col->nama_lengkap }}
                                                                </p>
                                                                <p><strong>Tempat Lahir:</strong> {{ $col->tempat_lahir }}
                                                                </p>
                                                                <p><strong>Tanggal Lahir:</strong>
                                                                    {{ $col->tanggal_lahir }}</p>
                                                                <p><strong>Jenis Kelamin:</strong>
                                                                    {{ $col->jenis_kelamin }}</p>
                                                                <p><strong>Alamat:</strong> {{ $col->alamat }}</p>
                                                                <p><strong>Nama Wali:</strong> {{ $col->nama_wali }}</p>
                                                                <!-- You can add more details as needed -->
                                                            </div>
                                                            <div class="col-md-6 text-center">
                                                                <img width="100%"
                                                                    src="{{ asset('storage/' . $col->gambar_santri) }}"
                                                                    alt="Gambar Santri" class="img-fluid img-thumbnail">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <td colspan="7" class="text-center">No Data Available</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $student->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

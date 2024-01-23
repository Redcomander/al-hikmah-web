@extends('layouts.nav-bootstrap')

@section('content')
    <style>
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

        .input-group {
            border: 2px solid #f2f2f2;
            /* Light gray outline for the search bar */
            border-radius: 5px;
            padding: 0px;
        }

        .search-label {
            border: none;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row justify-content-end mb-4">
                            <h4 class="lead text-center mb-4" style="color: #000000;">
                                <b> DATA CALON SANTRI BARU </b>
                            </h4>
                            <div class="col-lg-5">
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input type="text" class="form-control search-label" name="search" />
                                            <label class="form-label" for="form1">Search</label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="searchDropdown" data-bs-toggle="dropdown" style="padding: 13px"
                                                aria-haspopup="true" aria-expanded="false">
                                                Search In
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="searchDropdown">
                                                {{-- <button class="dropdown-item" type="submit" name="search_field"
                                                    value="barcode">Barcode</button> --}}
                                                <button class="dropdown-item" type="submit" name="search_field"
                                                    value="nama_lengkap">Nama</button>
                                                <button class="dropdown-item" type="submit" name="search_field"
                                                    value="nisn">NISN</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3">

                            <a href="{{ url('pendaftaran/create') }}" class="btn btn-dark mb-3">
                                <i class="bi bi-plus"></i> Tambah Baru
                            </a>
                            <div>
                                <a href="{{ route('pendaftaran.export') }}" class="btn btn-success">
                                    <i class="fas fa-file-excel"></i> Export
                                </a>
                            </div>
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Registrasi</th>
                                        <th>Nama Lengkap</th>
                                        <th>NISN</th>
                                        <th>Kelengkapan Dokumen</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap">
                                    @php
                                        $counter = 1; // Initialize the counter
                                    @endphp

                                    @forelse ($pendaftaran as $col)
                                        <tr class="align-middle">
                                            <td>{{ $counter++ }}</td>
                                            <td class="text-center">{!! $col->no_registrasi ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td>{!! $col->nama_lengkap ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">{!! $col->nisn ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-mdb-ripple-init
                                                    data-mdb-modal-init data-mdb-target="#dokumenModal{{ $col->id }}">
                                                    <i class="bi bi-file-earmark-fill"></i>
                                                </button>
                                                @include('pendaftaran.modal_dokumen')
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-mdb-ripple-init
                                                    data-mdb-modal-init data-mdb-target="#previewModal{{ $col->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                @include('pendaftaran.modal_detail')
                                            </td>
                                            <td class="text-center">
                                                @if ($col->verified)
                                                    <div class="badge bg-success rounded-pill">Verified</div>
                                                @else
                                                    <span class="badge bg-danger rounded-pill">Unverified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('pendaftaran/' . $col->id . '/edit') }}"
                                                    class="btn btn-success">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ url('pendaftaran/' . $col->id) }}" method="post"
                                                    id="deleteForm{{ $col->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ $col->id }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $pendaftaran->links('pagination::bootstrap-5') }}
                        </div>
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

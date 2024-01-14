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
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="lead text-center" style="color: #000000;">
                            <b> DATA CALON SANTRI BARU YANG TERVERIFIKASI </b>
                        </h4>
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
                                        <th>Validator</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap">
                                    @php
                                        $counter = 1; // Initialize the counter
                                    @endphp

                                    @forelse ($pendaftaran->where('verified', true) as $col)
                                        <tr class="align-middle">
                                            <td>{{ $counter++ }}</td>
                                            <td class="text-center">{!! $col->no_registrasi ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td>{!! $col->nama_lengkap ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">{!! $col->nisn ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#dokumenModal{{ $col->id }}">
                                                    <i class="bi bi-file-earmark-fill"></i>
                                                </button>
                                                @include('pendaftaran.modal_dokumen')
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#previewModal{{ $col->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                @include('pendaftaran.modal_detail')
                                            </td>
                                            <td class="text-center">
                                                @if ($col->verified)
                                                    <span class="badge bg-success rounded-pill">Verified</span>
                                                @else
                                                    <span class="badge bg-danger rounded-pill">Unverified</span>
                                                @endif
                                            </td>
                                            <td>{{ $col->verified_by }}</td>
                                        </tr>
                                        <!-- Modal -->
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

@endsection

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
                            <b> DATA CALON SANTRI BARU YANG BELUM TERVERIFIKASI </b>
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
                                        <th>Verifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1; // Initialize the counter
                                    @endphp

                                    @forelse ($pendaftaran->where('verified', false) as $col)
                                        <tr class="align-middle">
                                            <td>{{ $counter++ }}</td>
                                            <td class="text-center">{!! $col->no_registrasi ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td>{!! $col->nama_lengkap ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">{!! $col->nisn ?? '<i class="bi bi-x-circle-fill text-danger"></i>' !!}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#previewModal{{ $col->id }}">
                                                    <i class="bi bi-file-earmark-fill"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#previewModal{{ $col->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                @if ($col->verified)
                                                    <span class="text-success">Verified</span>
                                                @else
                                                    <span class="badge bg-danger rounded-pill">Unverified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ url('pendaftaran/' . $col->id . '/verify') }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success">
                                                        Verifikasi
                                                    </button>
                                                </form>
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
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

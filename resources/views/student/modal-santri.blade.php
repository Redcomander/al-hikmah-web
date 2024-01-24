<div class="modal fade custom-modal" id="previewModal{{ $col->id }}"
    tabindex="-1" aria-labelledby="previewModalLabel{{ $col->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel{{ $col->id }}"
                    style="color: #ffffff;">Detail Santri</h5>
                <button type="button" class="btn btn-light"
                    data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"><i class="fas fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-rensponsive table-fixed">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Nomor Induk</th>
                                        <td class="text-center">
                                                {{ $col->no_induk }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NISN</th>
                                        <td class="text-center">
                                                {{ $col->nisn }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td class="text-center">
                                                {{ $col->nama_lengkap }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td class="text-center">
                                                {{ $col->tempat_lahir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td class="text-center">
                                                {{ $col->tanggal_lahir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td class="text-center">
                                                {{ $col->jenis_kelamin }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td class="text-center">
                                                {{ $col->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Wali</th>
                                        <td class="text-center">
                                                {{ $col->nama_wali }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

<div class="modal fade custom-modal" id="dokumenModal{{ $col->id }}" tabindex="-1"
    aria-labelledby="dokumenModal{{ $col->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dokumenModal{{ $col->id }}" style="color: #ffffff;">Kelengkapan Dokumen
                </h5>
                <button type="button" class="btn-close btn-white" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                <div class="row table-responsive">
                    <!-- Image on the right side -->

                    <!-- Other content on the left side -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Dokumen</th>
                                <th>Status</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Foto 3X4</td>
                                <td>
                                    @if ($col->foto_3x4 !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->foto_3x4 !== null)
                                        <a href="{{ asset('storage/' . $col->foto_3x4) }}" class="btn btn-primary"
                                            download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Ijazah</td>
                                <td>
                                    @if ($col->file_ijazah !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_ijazah !== null)
                                        <a href="{{ asset('storage/' . $col->file_ijazah) }}" class="btn btn-primary"
                                            download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Surat Lulus</td>
                                <td>
                                    @if ($col->file_surat_lulus !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_surat_lulus !== null)
                                        <a href="{{ asset('storage/' . $col->file_surat_lulus) }}"
                                            class="btn btn-primary" download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Akte Lahir</td>
                                <td>
                                    @if ($col->file_akte_lahir !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_akte_lahir !== null)
                                        <a href="{{ asset('storage/' . $col->file_akte_lahir) }}"
                                            class="btn btn-primary" download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kartu Keluarga</td>
                                <td>
                                    @if ($col->file_kk !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_kk !== null)
                                        <a href="{{ asset('storage/' . $col->file_kk) }}" class="btn btn-primary"
                                            download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kartu Nomor Induk Siswa Nasional</td>
                                <td>
                                    @if ($col->file_kartu_nisn !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_kartu_nisn !== null)
                                        <a href="{{ asset('storage/' . $col->file_kartu_nisn) }}"
                                            class="btn btn-primary" download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kartu Indonesia Pintar</td>
                                <td>
                                    @if ($col->file_kartu_kip !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_kartu_kip !== null)
                                        <a href="{{ asset('storage/' . $col->file_kartu_kip) }}" class="btn btn-primary"
                                            download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kartu Program Keluarga Harapan</td>
                                <td>
                                    @if ($col->file_kartu_pkh !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_kartu_pkh !== null)
                                        <a href="{{ asset('storage/' . $col->file_kartu_pkh) }}"
                                            class="btn btn-primary" download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kartu Keluarga Sejahtera</td>
                                <td>
                                    @if ($col->file_kartu_kks !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_kartu_kks !== null)
                                        <a href="{{ asset('storage/' . $col->file_kartu_kks) }}" class="btn btn-primary"
                                            download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Foto Rapot</td>
                                <td>
                                    @if ($col->file_foto_rapot !== null)
                                        <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($col->file_foto_rapot !== null)
                                        <a href="{{ asset('storage/' . $col->file_foto_rapot) }}" class="btn btn-primary" download>
                                            Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            Download
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

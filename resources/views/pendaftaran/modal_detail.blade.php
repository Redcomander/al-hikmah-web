<div class="modal fade custom-modal" id="previewModal{{ $col->id }}" tabindex="-1"
    aria-labelledby="previewModalLabel{{ $col->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel{{ $col->id }}" style="color: #ffffff;">Detail Santri
                </h5>
                <button type="button" class="btn-close btn-white" data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                <div class="row table-rensponsive table-fixed">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nomor Registrasi</th>
                                <td class="text-center">
                                    @if ($col->no_registrasi !== null)
                                        {{ $col->no_registrasi }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td class="text-center">
                                    @if ($col->email !== null)
                                        {{ $col->email }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td class="text-center">
                                    @if ($col->nama_lengkap !== null)
                                        {{ $col->nama_lengkap }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td class="text-center">
                                    @if ($col->tempat_lahir !== null)
                                        {{ $col->tempat_lahir }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td class="text-center">
                                    @if ($col->tanggal_lahir !== null)
                                        {{ $col->tanggal_lahir }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td class="text-center">
                                    @if ($col->jenis_kelamin !== null)
                                        {{ $col->jenis_kelamin }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Siswa Nasional (NISN)</th>
                                <td class="text-center">
                                    @if ($col->nisn !== null)
                                        {{ $col->nisn }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Kependudukan (NIK)</th>
                                <td class="text-center">
                                    @if ($col->nik !== null)
                                        {{ $col->nik }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Hobi</th>
                                <td class="text-center">
                                    @if ($col->hobi !== null)
                                        {{ $col->hobi }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>cita-cita</th>
                                <td class="text-center">
                                    @if ($col->cita_cita !== null)
                                        {{ $col->cita_cita }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Anak Ke</th>
                                <td class="text-center">
                                    @if ($col->anak_ke !== null)
                                        {{ $col->anak_ke }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Saudara Kandung</th>
                                <td class="text-center">
                                    @if ($col->jumlah_saudara_kandung !== null)
                                        {{ $col->jumlah_saudara_kandung }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td class="text-center text-wrap">
                                    @if ($col->alamat !== null)
                                        {{ $col->alamat }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>RT/RW</th>
                                <td class="text-center">
                                    @if ($col->rt_rw !== null)
                                        {{ $col->rt_rw }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Dusun</th>
                                <td class="text-center">
                                    @if ($col->dusun !== null)
                                        {{ $col->dusun }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td class="text-center">
                                    @if ($col->desa !== null)
                                        {{ $col->desa }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td class="text-center">
                                    @if ($col->kecamatan !== null)
                                        {{ $col->kecamatan }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kabupaten/Kota</th>
                                <td class="text-center">
                                    @if ($col->kabupaten !== null)
                                        {{ $col->kabupaten }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td class="text-center">
                                    @if ($col->provinsi !== null)
                                        {{ $col->provinsi }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td class="text-center">
                                    @if ($col->kode_pos !== null)
                                        {{ $col->kode_pos }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Kartu Keluarga (KK)</th>
                                <td class="text-center">
                                    @if ($col->no_kk !== null)
                                        {{ $col->no_kk }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Kepala Keluarga</th>
                                <td class="text-center">
                                    @if ($col->kepala_keluarga !== null)
                                        {{ $col->kepala_keluarga }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Ayah Kandung</th>
                                <td class="text-center">
                                    @if ($col->nama_ayah_kandung !== null)
                                        {{ $col->nama_ayah_kandung }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status Ayah</th>
                                <td class="text-center">
                                    @if ($col->status_ayah !== null)
                                        {{ $col->status_ayah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Kependudukan (NIK) Ayah</th>
                                <td class="text-center">
                                    @if ($col->nik_ayah !== null)
                                        {{ $col->nik_ayah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ayah</th>
                                <td class="text-center">
                                    @if ($col->pekerjaan_ayah !== null)
                                        {{ $col->pekerjaan_ayah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Ayah</th>
                                <td class="text-center text-wrap">
                                    @if ($col->alamat_ayah !== null)
                                        {{ $col->alamat_ayah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Ibu Kandung</th>
                                <td class="text-center">
                                    @if ($col->nama_ibu_kandung !== null)
                                        {{ $col->nama_ibu_kandung }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status Ibu</th>
                                <td class="text-center">
                                    @if ($col->status_ibu !== null)
                                        {{ $col->status_ibu }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Kependudukan (NIK) Ibu</th>
                                <td class="text-center">
                                    @if ($col->nik_ibu !== null)
                                        {{ $col->nik_ibu }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Pekerjaan Ibu</th>
                                <td class="text-center">
                                    @if ($col->pekerjaan_ibu !== null)
                                        {{ $col->pekerjaan_ibu }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Ibu</th>
                                <td class="text-center text-wrap">
                                    @if ($col->alamat_ibu !== null)
                                        {{ $col->alamat_ibu }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Wali</th>
                                <td class="text-center">
                                    @if ($col->nama_wali !== null)
                                        {{ $col->nama_wali }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Kependudukan (NIK) Wali</th>
                                <td class="text-center">
                                    @if ($col->nik_wali !== null)
                                        {{ $col->nik_wali }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Wali</th>
                                <td class="text-center text-wrap">
                                    @if ($col->alamat_wali !== null)
                                        {{ $col->alamat_wali }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Penghasilan Orang Tua/Wali per Bulan</th>
                                <td class="text-center">
                                    @if ($col->penghasilan !== null)
                                        {{ $col->penghasilan }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Kartu Keluarga Sejahtera</th>
                                <td class="text-center">
                                    @if ($col->no_kks !== null)
                                        {{ $col->no_kks }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Program Keluarga Harapan</th>
                                <td class="text-center">
                                    @if ($col->no_pkh !== null)
                                        {{ $col->no_pkh }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Kartu Indonesia Pintar</th>
                                <td class="text-center">
                                    @if ($col->no_kip !== null)
                                        {{ $col->no_kip }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Asal Sekolah</th>
                                <td class="text-center">
                                    @if ($col->asal_sekolah !== null)
                                        {{ $col->asal_sekolah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Pokok Sekolah Nasional (NPSN) Sekolah Asal</th>
                                <td class="text-center">
                                    @if ($col->npsn_sekolah !== null)
                                        {{ $col->npsn_sekolah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Sekolah Asal</th>
                                <td class="text-center text-wrap">
                                    @if ($col->alamat_sekolah !== null)
                                        {{ $col->alamat_sekolah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Surat Keterangan Lulus</th>
                                <td class="text-center">
                                    @if ($col->no_surat_lulus !== null)
                                        {{ $col->no_surat_lulus }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Blangko Ijazah</th>
                                <td class="text-center">
                                    @if ($col->no_blangko_ijazah !== null)
                                        {{ $col->no_blangko_ijazah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nilai Rata-Rata Ijazah</th>
                                <td class="text-center">
                                    @if ($col->nilai_rata2_ijazah !== null)
                                        {{ $col->nilai_rata2_ijazah }}
                                    @else
                                        <i class="bi bi-x-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                            <tr class="align-middle">
                                <th>Foto 3X4</th>
                                <td class="text-center">
                                    @if ($col->foto_3x4 !== null)
                                        <!-- Assuming $col->foto_3x4 contains the image URL -->
                                        <img src="{{ asset('storage/' . $col->foto_3x4) }}" alt="Foto 3x4"
                                            class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        <p class="text-danger">Gambar Tidak Tersedia</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                    data-mdb-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

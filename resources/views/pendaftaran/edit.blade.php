@extends('layouts.bootstrap5')

@section('content')
    <style>
        .custom-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-form label {
            font-weight: bold;
            color: #333;
        }

        .custom-form input[type="text"],
        .custom-form textarea,
        .custom-form input[type="file"],
        .custom-form button {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-form input[type="text"]:focus,
        .custom-form textarea:focus,
        .custom-form input[type="file"]:focus,
        .custom-form button:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.6);
        }

        .custom-form input[type="text"]::placeholder,
        .custom-form textarea::placeholder {
            color: #999;
            transition: color 0.2s ease;
        }

        .custom-form input[type="text"]:focus::placeholder,
        .custom-form textarea:focus::placeholder {
            color: #555;
        }

        .custom-form button[type="submit"] {
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 25px;
            margin-top: 10px;
            transition: background-color 0.2s ease;
            padding: 6px 12px;
            /* Adjust padding to make the buttons smaller */
            width: auto;
            /* Allow the buttons to adjust their width based on content */
        }

        .custom-form button[type="submit"]:hover {
            background-color: #23272b;
        }
    </style>

    <h1 class="text-center mt-4">Formulir Pendaftaran Calon Santri Baru</h1>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 bg-white custom-form">
                <form method="post" action="{{ url('pendaftaran/' . $pendaftaran->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="no_registrasi" class="form-label">Nomor Registrasi</label>
                        <input type="number" class="form-control" id="no_registrasi" name="no_registrasi"
                            placeholder="Email" value="{{ $pendaftaran->no_registrasi }}">
                    </div>
                    <div class="mb-3">
                        <label for="email_pendaftar" class="form-label">Email (Opsional)</label>
                        <input type="email" class="form-control" id="email_pendaftar" name="email_pendaftar"
                            placeholder="Email" value="{{ $pendaftaran->email_pendaftar }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            placeholder="Nama Lengkap" value="{{ $pendaftaran->nama_lengkap }}">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            placeholder="Tempat Lahir" value="{{ $pendaftaran->tempat_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $pendaftaran->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="{{ $pendaftaran->jenis_kelamin }}">{{ $pendaftaran->jenis_kelamin }}</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN"
                            value="{{ $pendaftaran->nisn }}">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK"
                            value="{{ $pendaftaran->nik }}">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama"
                            value="{{ $pendaftaran->agama }}">
                    </div>
                    <div class="mb-3">
                        <label for="hobi" class="form-label">Hobi</label>
                        <input type="text" class="form-control" id="hobi" name="hobi" placeholder="Hobi"
                            value="{{ $pendaftaran->hobi }}">
                    </div>
                    <div class="mb-3">
                        <label for="cita_cita" class="form-label">Cita-cita</label>
                        <input type="text" class="form-control" id="cita_cita" name="cita_cita"
                            placeholder="Cita-cita" value="{{ $pendaftaran->cita_cita }}">
                    </div>
                    <div class="mb-3">
                        <label for="anak_ke" class="form-label">Anak Ke</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak Ke"
                            value="{{ $pendaftaran->anak_ke }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_saudara_kandung" class="form-label">Jumlah Saudara Kandung</label>
                        <input type="number" class="form-control" id="jumlah_saudara_kandung"
                            name="jumlah_saudara_kandung" placeholder="Jumlah Saudara"
                            value="{{ $pendaftaran->jumlah_saudara }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat"
                            value="{{ $pendaftaran->alamat }}">{{ $pendaftaran->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rt_rw" class="form-label">RT/RW</label>
                        <input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="RT/RW"
                            value="{{ $pendaftaran->rt_rw }}">
                    </div>
                    <div class="mb-3">
                        <label for="dusun" class="form-label">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun"
                            value="{{ $pendaftaran->dusun }}">
                    </div>
                    <div class="mb-3">
                        <label for="desa" class="form-label">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa"
                            value="{{ $pendaftaran->desa }}">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                            placeholder="Kecamatan" value="{{ $pendaftaran->kecamatan }}">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                            placeholder="Kabupaten" value="{{ $pendaftaran->kabupaten }}">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            placeholder="Provinsi" value="{{ $pendaftaran->provinsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="number" class="form-control" id="kode_pos" name="kode_pos"
                            placeholder="Kode Pos" value="{{ $pendaftaran->kode_pos }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk"
                            placeholder="Nomor Kartu Keluarga" value="{{ $pendaftaran->no_kk }}">
                    </div>
                    <div class="mb-3">
                        <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                        <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga"
                            placeholder="Kepala Keluarga" value="{{ $pendaftaran->kepala_keluarga }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama_ayah_kandung" class="form-label">Nama Ayah Kandung</label>
                        <input type="text" class="form-control" id="nama_ayah_kandung" name="nama_ayah_kandung"
                            placeholder="Nama Ayah Kandung" value="{{ $pendaftaran->nama_ayah_kandung }}">
                    </div>
                    <div class="mb-3">
                        <label for="status_ayah" class="form-label">Status Ayah</label>
                        <select name="status_ayah" id="status_ayah" class="form-select">
                            <option value="{{ $pendaftaran->status_ayah }}">{{ $pendaftaran->status_ayah }}</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nik_ayah" class="form-label">Nomor Induk Kependudukan (NIK) Ayah</label>
                        <input type="number" class="form-control" id="nik_ayah" name="nik_ayah"
                            placeholder="Nomor Induk Kependudukan (NIK) Ayah" value="{{ $pendaftaran->nik_ayah }}">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            placeholder="Pekerjaan Ayah" value="{{ $pendaftaran->pekerjaan_ayah }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                        <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="10" placeholder="Alamat Ayah"
                            value="{{ $pendaftaran->alamat_ayah }}">{{ $pendaftaran->alamat_ayah }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ibu_kandung" class="form-label">Nama Ibu Kandung</label>
                        <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung"
                            placeholder="Nama Ibu Kandung" value="{{ $pendaftaran->nama_ibu_kandung }}">
                    </div>
                    <div class="mb-3">
                        <label for="status_ibu" class="form-label">Status Ibu</label>
                        <select name="status_ibu" id="status_ibu" class="form-select">
                            <option value="{{ $pendaftaran->status_ibu }}">{{ $pendaftaran->status_ibu }}</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nik_ibu" class="form-label">Nomor Induk Kependudukan (NIK) Ibu</label>
                        <input type="number" class="form-control" id="nik_ibu" name="nik_ibu"
                            placeholder="Nomor Induk Kependudukan (NIK) Ibu" value="{{ $pendaftaran->nik_ibu }}">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            placeholder="Pekerjaan Ibu" value="{{ $pendaftaran->pekerjaan_ibu }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                        <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="10" placeholder="Alamat Ibu"
                            value="{{ $pendaftaran->alamat_ibu }}">{{ $pendaftaran->alamat_ibu }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama_wali" class="form-label">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                            placeholder="Nama Wali" value="{{ $pendaftaran->nama_wali }}">
                    </div>
                    <div class="mb-3">
                        <label for="nik_wali" class="form-label">Nomor Induk Kependudukan (NIK) Wali</label>
                        <input type="number" class="form-control" id="nik_wali" name="nik_wali"
                            placeholder="Nomor Induk Kependudukan (NIK) Wali" value="{{ $pendaftaran->nik_wali }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_wali" class="form-label">Alamat Wali</label>
                        <textarea name="alamat_wali" id="alamat_wali" cols="30" rows="10" placeholder="Alamat Wali"
                            value="{{ $pendaftaran->alamat_wali }}">{{ $pendaftaran->alamat_wali }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="penghasilan" class="form-label">Penghasilan Orang Tua/Wali per Bulan dalam Rupiah
                            (Rp)</label>
                        <input type="text" class="form-control" id="penghasilan" name="penghasilan"
                            placeholder="Penghasilan Orang Tua/Wali per Bulan dalam Rupiah (Rp)"
                            value="{{ $pendaftaran->penghasilan }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_kks" class="form-label">Nomor Kartu Keluarga Sejahtera (Opsional)</label>
                        <input type="number" class="form-control" id="no_kks" name="no_kks"
                            placeholder="Nomor Kartu Keluarga Sejahtera (Opsional)" value="{{ $pendaftaran->no_kks }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_pkh" class="form-label">Nomor Program Keluarga Harapan (Opsional)</label>
                        <input type="number" class="form-control" id="no_pkh" name="no_pkh"
                            placeholder="Nomor Program Keluarga Harapan (Opsional)" value="{{ $pendaftaran->no_pkh }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_kip" class="form-label">Nomor Kartu Indonesia Pintar (Opsional)</label>
                        <input type="number" class="form-control" id="no_kip" name="no_kip"
                            placeholder="Nomor Kartu Indonesia Pintar (Opsional)" value="{{ $pendaftaran->no_kip }}">
                    </div>
                    <div class="mb-3">
                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                            placeholder="Asal Sekolah" value="{{ $pendaftaran->asal_sekolah }}">
                    </div>
                    <div class="mb-3">
                        <label for="npsn_sekolah" class="form-label">Nomor Pokok Sekolah Nasional (NPSN) Sekolah
                            Asal</label>
                        <input type="number" class="form-control" id="npsn_sekolah" name="npsn_sekolah"
                            placeholder="Nomor Pokok Sekolah Nasional (NPSN) Sekolah Asal"
                            value="{{ $pendaftaran->npsn_sekolah }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                        <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah"
                            placeholder="Alamat Sekolah" value="{{ $pendaftaran->alamat_sekolah }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_surat_lulus" class="form-label">Nomor Surat Keterangan Lulus</label>
                        <input type="text" class="form-control" id="no_surat_lulus" name="no_surat_lulus"
                            placeholder="Nomor Surat Keterangan Lulus" value="{{ $pendaftaran->no_surat_lulus }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_blangko_ijazah" class="form-label">Nomor Blangko Ijazah (Opsional)</label>
                        <input type="text" class="form-control" id="no_blangko_ijazah" name="no_blangko_ijazah"
                            placeholder="Nomor Blangko Ijazah" value="{{ $pendaftaran->no_blangko_ijazah }}">
                    </div>
                    <div class="mb-3">
                        <label for="nilai_rata2_ijazah" class="form-label">Nilai Rata-Rata Ijazah</label>
                        <input type="text" class="form-control" id="nilai_rata2_ijazah" name="nilai_rata2_ijazah"
                            placeholder="Nilai Rata-Rata Ijazah" value="{{ $pendaftaran->nilai_rata2_ijazah }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto_3x4" class="form-label">Foto Ukuran 3X4</label>
                        <input type="file" class="form-control" id="foto_3x4" name="foto_3x4">
                    </div>
                    <div class="mb-3">
                        <label for="file_ijazah" class="form-label">Ijazah</label>
                        <input type="file" class="form-control" id="file_ijazah" name="file_ijazah">
                    </div>
                    <div class="mb-3">
                        <label for="file_surat_lulus" class="form-label">Surat Keterangan Lulus</label>
                        <input type="file" class="form-control" id="file_surat_lulus" name="file_surat_lulus">
                    </div>
                    <div class="mb-3">
                        <label for="file_akte_lahir" class="form-label">Akte Kelahiran</label>
                        <input type="file" class="form-control" id="file_akte_lahir" name="file_akte_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="file_kk" class="form-label">Kartu Keluarga</label>
                        <input type="file" class="form-control" id="file_kk" name="file_kk">
                    </div>
                    <div class="mb-3">
                        <label for="file_kartu_nisn" class="form-label">Kartu Nomor Induk Siswa Nasional
                            (Opsional)</label>
                        <input type="file" class="form-control" id="file_kartu_nisn" name="file_kartu_nisn">
                    </div>
                    <div class="mb-3">
                        <label for="file_kartu_kip" class="form-label">Kartu Indonesia Pintar (Opsional)</label>
                        <input type="file" class="form-control" id="file_kartu_kip" name="file_kartu_kip">
                    </div>
                    <div class="mb-3">
                        <label for="file_kartu_pkh" class="form-label">Kartu Program Keluarga Harapan (Opsional)</label>
                        <input type="file" class="form-control" id="file_kartu_pkh" name="file_kartu_pkh">
                    </div>
                    <div class="mb-3">
                        <label for="file_kartu_kks" class="form-label">Kartu Keluarga Sejahtera (Opsional)</label>
                        <input type="file" class="form-control" id="file_kartu_kks" name="file_kartu_kks">
                    </div>
                    <div class="mb-3">
                        <label for="file_foto_rapot" class="form-label">Foto Rapot (Halaman Identitas dan Halaman Nilai
                            Semester Akhir)</label>
                        <input type="file" class="form-control" id="file_foto_rapot" name="file_foto_rapot">
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i>
                        Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

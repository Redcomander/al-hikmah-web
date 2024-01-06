@extends('layouts.bootstrap5')

@section('content')
    <style>
        .section-one {
            background: url('{{ asset('cover_pendaftaran_1.PNG') }}') center/cover no-repeat;
        }

        @media (max-width: 991.97px) {
            #heading-h1 {
                -webkit-text-stroke: 0.5px white;
            }

            #p-heading {
                color: black;
            }
        }
    </style>
    <section class="section-one mb-5">
        <div class="container">
            <div class="row align-items-center" style="height: 90vh;">
                <div class="col-lg-7 col-md-7">
                    <div class="title-heading position-relative mt-4" style="z-index: 1;" data-aos="fade-right">
                        <h1 id="heading-h1" class="heading mb-3"><span style="color: black;">Pendaftaran</span> <span class="text-success">Santri Baru</span>
                        </h1>
                        <p id="p-heading" class="para-desc">Selamat datang di Sistem pendaftaran daring (online) <br> <strong>Pondok Modern
                                Al-Hikmah Utan Sumbawa</strong> Tahun Ajaran 2024-2025<br> bagi calon santri baru.</p>
                        <p id="p-heading"> <b>Gelombang I : 13 Januari - 31 Maret 2024</b> </p>
                        <p id="p-heading"> <b>Gelombang II : 1 April - 30 Juni 2024</b> </p>
                        <div class="mt-4 pt-2">
                            <a href="{{ url('pendaftaran/create') }}" class="btn btn-success mt-2 mr-2 mb-5">Formulir
                                Pendaftaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-two mb-5" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-60">
                        <h4 class="main-title mb-4">Syarat Pendaftaran</h4>

                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <img src="{{ asset('pendaftaran_icon.jpg') }}" class="img-fluid">
                </div>
                <div class="col-lg-7 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ml-lg-5">
                        <ol>
                            <li class="mb-2">
                                Niat dan bersungguh-sungguh belajar di Pondok Pesantren.
                            </li>
                            <li class="mb-2">
                                Lulus SD/ MI, SMP/ MTs sederajat.
                            </li>
                            <li class="mb-2">
                                Mengisi formulir pendaftaran
                            </li>
                            <li class="mb-2">
                                Menyerahkan berkas :
                                <ul>
                                    <li class="mb-2">Fotocopy Akta Kelahiran <span class="text-success"><b>3 (tiga)
                                                lembar</b></span>.</li>
                                    <li class="mb-2">Fotocopy Kartu Keluarga <span class="text-success"><b>3 (tiga)
                                                lembar</b></span>.</li>
                                    <li class="mb-2">Fotocopy KTP Orang Tua/ Ayah dan Ibu <span class="text-success"><b>3
                                                (tiga) lembar</b></span>.</li>
                                    <li class="mb-2">Fotocopy Ijazah Terakhir (dilegalisir) <span
                                            class="text-success"><b>3 (tiga) lembar</b></span>.</li>
                                    <li class="mb-2">Fotocopy Rapot (jika Ijazahnya belum keluar) <span
                                            class="text-success"><b>1 (satu) lembar</b></span>.</li>
                                    <li class="mb-2">Pas Foto 3 x 4 berwarna <span class="text-success"><b>4 (empat)
                                                lembar</b></span> : laki-laki (kemeja putih
                                        tanpa tutup kepala ) perempuan ( kemeja putih jilbab putih ).</li>
                                    <li class="mb-2">Surat pindah dan raport bagi yang pindah.</li>
                                    <li class="mb-2">fotocopy Kartu Indonesia Pintar (KIP), PKH, KKS ( bagi yang memiliki
                                        ).</li>
                                </ul>
                            </li>
                            <li class="mb-2">
                                Menandatangani surat pernyataan kesanggupan belajar di Pondok.
                            </li>
                            <li class="mb-2">
                                Mengikuti ujian masuk/tes masuk.
                            </li>


                            <p><i>Nb : Bagi lulusan TPA/TPQ & MADIN dapat diterima tanpa Tes dengan syarat menyerahkan
                                    Ijazah TPA/TPQ & MADIN dan telah Khatam Al-Quran serta memenuhi standar nilai.</i></p>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-three mb-5" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-7 col-md-6">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th colspan="2" class="text-center text-white">RINCIAN BIAYA PENDAFTARAN SANTRI BARU</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Administrasi Pendaftaran</td>
                                <td> Rp 150.000,- </td>
                            </tr>
                            <tr>
                                <td>Uang Pangkal Meja & Bangku</td>
                                <td> Rp 250.000,- </td>
                            </tr>
                            <tr>
                                <td>Sumbangan Pembangunan & Pemeliharaan Kampus</td>
                                <td> Rp 400.000,- </td>
                            </tr>
                            <tr>
                                <td>Wakaf Tunai</td>
                                <td> Rp 500.000,- </td>
                            </tr>
                            <tr>
                                <td>Uang Organisasi ( 1 Tahun )</td>
                                <td> Rp 180.000,- </td>
                            </tr>
                            <tr>
                                <td>Pekan Perkenalan & Apel Tahunan</td>
                                <td> Rp 90.000,- </td>
                            </tr>
                            <tr>
                                <td>Simpanan Pokok Santri</td>
                                <td> Rp 50.000,- </td>
                            </tr>
                            <tr>
                                <td>Uang Ujian KMI ( 1 Tahun )</td>
                                <td> Rp 100.000,- </td>
                            </tr>
                            <tr>
                                <td>Papan Nama & Kartu Identitas</td>
                                <td> Rp 30.000,- </td>
                            </tr>
                            <tr>
                                <td>Kitab KMI, Kamus Bhs Arab & Al-Qur’an Tikrar</td>
                                <td> Rp 525.000,- </td>
                            </tr>
                            <tr>
                                <td>Buku Paket + Map Rapor</td>
                                <td> Rp 275.000,- </td>
                            </tr>
                            <tr>
                                <td class="text-center"><b>TOTAL</b></td>
                                <td><b> Rp 2.550.000,- </b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 col-md-4">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th colspan="2" class="text-center text-white">RINCIAN BIAYA SANTRI TIAP BULAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Uang Makan</td>
                                <td> Rp 350.000,- </td>
                            </tr>
                            <tr>
                                <td>Kesehatan</td>
                                <td> Rp 50.000,- </td>
                            </tr>
                            <tr>
                                <td>Listrik & Air</td>
                                <td> Rp 50.000,- </td>
                            </tr>
                            <tr>
                                <td>SPP</td>
                                <td> Rp 50.000,- </td>
                            </tr>
                            <tr>
                                <td>Simpanan Wajib</td>
                                <td> Rp 25.000,- </td>
                            </tr>
                            <tr>
                                <td class="text-center"><b>TOTAL</b></td>
                                <td><b> Rp 350.000,- </b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="section-four mb-5" data-aos="fade-up">
        <div class="container">
            <h1 class="text-center mb-5">INFORMASI LEBIH LANJUT</h1>
            <h4 class="text-center mb-3">Kontak Personal</h4>
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-4 mb-5">
                <a href="https://wa.me/+6285237563046?text=Assalamu'alaikum,%20Saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20pendaftaran"
                    class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadz Imam Sudarmoko</a>
                <a href="https://wa.me/+6282264184506?text=Assalamu'alaikum,%20Saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20pendaftaran"
                    class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadzah Ihda Qurrati 'Aini</a>
                <a href="https://wa.me/+6285931100660?text=Assalamu'alaikum,%20Saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20pendaftaran"
                    class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadz Saiful Bahri</a>
                <a href="https://wa.me/+6285172390625?text=Assalamu'alaikum,%20Saya%20ingin%20bertanya%20lebih%20lanjut%20mengenai%20pendaftaran"
                    class="btn btn-success"><i class="bi bi-whatsapp"></i> Ustadzah Anggita Larasati</a>
            </div>
            <h4 class="text-center mb-3">Alamat Sekretariat</h4>
            <div class="d-flex justify-content-center mb-5">
                <a href="https://maps.app.goo.gl/4tyeGuvSdW9bHxbG8" target="_blank" class="text-black text-center"><i
                        class="bi bi-geo-alt-fill"></i> Gedung Al-Fatihah Pondok Modern Al-Hikmah, Jl. Lintas
                    Sumbawa-Tano, Bina Marga, Stowe Brang, Utan, Sumbawa, NTB 84352</a>
            </div>
            <h4 class="text-center mb-3">Brosur Penerimaan Calon Santri Tahun Ajaran 2024-2025</h4>
            <div class="d-flex justify-content-center">
                <a href="{{ asset('brosur_2024.pdf') }}" download="{{ asset('brosur_2024.pdf') }}"
                    class="btn btn-primary">Download Brosur Disini</a>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.nav-bootstrap')

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
            background-color: #fff;
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

        .custom-form button[type="submit"],
        .custom-form button[name="draft"] {
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

        .custom-form button[type="submit"]:hover,
        .custom-form button[name="draft"]:hover {
            background-color: #23272b;
        }

        :root {
            --progress-height: 10px;
            --progress-font-size: 14px;
            --progress-bg: #f8f9fa;
            --progress-border-radius: 8px;
            --progress-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --progress-bar-color: #007bff;
            --progress-bar-bg: #fff;
            --progress-bar-transition: 0.2s ease;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 bg-white custom-form">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ url('teacher') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        @livewire('teacher-image-upload')
                    </div>
                    <div class="mb-3">
                        <label for="wali_kelas" class="form-label">Wali Kelas</label>
                        <select name="wali_kelas" id="wali_kelas" class="form-select">
                            <option selected disabled>-- Pilih Kelas --</option>
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 1 Exp">Kelas 1 Exp</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                            <option value="Kelas 3 Exp">Kelas 3 Exp</option>
                            <option value="Kelas 4">Kelas 4</option>
                            <option value="Kelas 5">Kelas 5</option>
                            <option value="Kelas 6">Kelas 6</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Guru</label>
                        <select name="status" id="status" class="form-select">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Guru Pengabdian">Guru Pengabdian</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <select name="grade_1" id="grade_1" class="form-select mb-2">
                            <option selected disabled>-- Pilih Grade --</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                            <option value="Panitia Ujian">Panitia Penerimaan Calon Santri Baru</option>
                        </select>
                        <select name="grade_2" id="grade_2" class="form-select mb-2">
                            <option selected disabled>-- Pilih Grade --</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                            <option value="Panitia Ujian">Panitia Penerimaan Calon Santri Baru</option>
                            <option value="-">-</option>
                        </select>
                        <select name="grade_3" id="grade_3" class="form-select">
                            <option selected disabled>-- Pilih Grade --</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                            <option value="Panitia Ujian">Panitia Penerimaan Calon Santri Baru</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i>
                        Submit</button>
            </div>
            </form>
        </div>
    </div>
    @livewireScripts

    <!-- Initialize Livewire -->
    <script>
        Livewire.on('fileUploadProgress', progress => {
            window.livewire.emit('updateFileUploadProgress', progress);
        });
    </script>
@endsection

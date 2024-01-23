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

        .custom-form button[type="submit"] {
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 25px;
            margin-top: 10px;
            transition: background-color 0.2s ease;
            padding: 6px 12px;
            width: auto;
        }

        .custom-form button[type="submit"]:hover {
            background-color: #23272b;
        }

        .image-container {
            position: relative;
            overflow: hidden;
            width: 150px;
            height: 150px;
        }

        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            display: block;
        }

        .image-container .change-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.2s ease;
            cursor: pointer;
        }

        .image-container:hover .change-overlay {
            opacity: 1;
        }

        .image-container .change-overlay i {
            color: #fff;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .image-container .change-overlay span {
            color: #fff;
            font-weight: bold;
        }

        /* Style the custom file input */
        .custom-file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        /* input[type="file"] {
            display: none;
        } */

        .image-preview {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            margin-bottom: 20px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 bg-white custom-form">
                <form method="post" action="{{ url('teacher/' . $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
                    </div>
                    @livewire('teacher-edit', ['userId' => $user->id])
                    <div class="mb-3">
                        <label for="wali_kelas" class="form-label">Wali Kelas</label>
                        <select name="wali_kelas" id="wali_kelas" class="form-select">
                            <option value="{{ $user->wali_kelas }}">{{ $user->wali_kelas }}</option>
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
                            <option value="{{ $user->status }}">{{ $user->status }}</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Guru Pengabdian">Guru Pengabdian</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">Grade</label>
                        <select name="grade_1" id="grade_1" class="form-select mb-2">
                            <option value="{{ $user->grade_1 }}">{{ $user->grade_1 }}</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                        </select>
                        <select name="grade_2" id="grade_2" class="form-select mb-2">
                            <option value="{{ $user->grade_2 }}">{{ $user->grade_2 }}</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                            <option value="-">-</option>
                        </select>
                        <select name="grade_3" id="grade_3" class="form-select">
                            <option value="{{ $user->grade_3 }}">{{ $user->grade_3 }}</option>
                            <option value="Developer">Developer</option>
                            <option value="Website Admin">Website Admin</option>
                            <option value="Pimpinan Pondok">Pimpinan Pondok</option>
                            <option value="Direktur KMI">Direktur KMI</option>
                            <option value="Guru Senior (Dalam)">Guru Senior (Dalam)</option>
                            <option value="Guru Senior (Luar)">Guru Senior (Luar)</option>
                            <option value="Pengajaran">Pengajaran</option>
                            <option value="Pengasuhan Santri">Pengasuhan Santri</option>
                            <option value="Panitia Ujian">Panitia Ujian</option>
                            <option value="-">-</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@livewireScripts
@endsection

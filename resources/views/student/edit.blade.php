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
            width: auto;
        }

        .custom-form button[type="submit"]:hover,
        .custom-form button[name="draft"]:hover {
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

        input[type="file"] {
            display: none;
        }
    </style>

    <div class="container mt-5 justify-content">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 bg-white custom-form">
                <form method="post" action="{{ url('student/' . $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="no_induk" class="form-label">Nomor Induk</label>
                        <input type="text" class="form-control" id="no_induk" name="no_induk"
                            value="{{ $student->no_induk }}" placeholder="Nomor Induk">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $student->nama_lengkap }}" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $student->tempat_lahir }}" placeholder="Tempat Lahir">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $student->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="laki-laki" @if ($student->jenis_kelamin === 'laki-laki') selected @endif>Laki-laki</option>
                            <option value="perempuan" @if ($student->jenis_kelamin === 'perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat">{{ $student->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn"
                            value="{{ $student->nisn }}" placeholder="NISN">
                    </div>
                    <div class="text-center mb-4"> <!-- Add a text-center class for centering -->
                        <label class="image-container">
                            <img src="{{ asset('storage/' . $student->gambar_santri) }}" alt="Gambar Santri" class="img-fluid">
                            <div class="change-overlay">
                                <i class="fas fa-camera"></i>
                                <span>Change</span>
                            </div>
                        </label>
                        <input type="file" id="gambar_santri" name="gambar_santri" accept="image/*" style="display: none;">
                    </div>
                    <div class="mb-3">
                        <label for="nama_wali" class="form-label">Nama Wali</label>
                        <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                            value="{{ $student->nama_wali }}" placeholder="Nama Wali">
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    // Trigger the file input when clicking the image or "Change" text
    document.addEventListener("DOMContentLoaded", function() {
        const imageContainer = document.querySelector('.image-container');
        const fileInput = document.querySelector('input[type="file"]');

        imageContainer.addEventListener("click", function() {
            fileInput.click();
        });
    });
</script>

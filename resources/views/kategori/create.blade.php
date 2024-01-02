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
        padding: 6px 12px; /* Adjust padding to make the buttons smaller */
        width: auto; /* Allow the buttons to adjust their width based on content */
    }

    .custom-form button[type="submit"]:hover,
    .custom-form button[name="draft"]:hover {
        background-color: #23272b;
    }

    /* Styling for Quill container */
    #quill-container {
        height: 400px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        background-color: #fff;
    }


</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 bg-white custom-form">
            <form method="post" action="{{ url('kategori') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="Kategori" name="Kategori" placeholder="Kategori">
                </div>
                <div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

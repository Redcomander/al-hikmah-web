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
            <form method="post" action="{{ url('article/'.$article->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel</label>
                    <input value="{{ $article->title }}" type="text" class="form-control" id="title" name="title" placeholder="Judul artikel">
                </div>
                <div class="mb-3">
                    <label for="quill-content" class="form-label">Isi Artikel</label>
                    <!-- Quill editor container -->
                    <div id="quill-container">{!! $article->content !!}</div>
                    <!-- Hidden input field to capture Quill-generated HTML -->
                    <input value="{{ $article->content }}" type="hidden" id="quill-content" name="content">
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input value="{{ $article->kategori }}" type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Artikel">
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Author</label>
                    <select id="user_id" name="user_id" class="form-select">
                        <option selected disabled>-- Choose Author --</option>
                        @foreach ($author as $col)
                            <option @if($article->user_id == $col->id) selected @endif value="{{ $col->id }}">{{ $col->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar_article" class="form-label">Gambar Artikel</label>
                    @if ($article->gambar_article)
                        <img src="{{ asset('storage/' . $article->gambar_article) }}" alt="Current Gambar Artikel" class="img-fluid mb-2">
                    @endif
                    <input type="file" name="gambar_article" class="form-control">
                    <input type="hidden" name="current_gambar_article" value="{{ $article->gambar_article }}">
                </div>
                    <button type="submit" class="btn btn-dark rounded-pill me-2"><i class="bi bi-send"></i> Publish</button>
                    <button type="submit" name="draft" value="1" class="btn btn-dark rounded-pill"><i class="bi bi-journal-text"></i> Draft</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Quill JavaScript -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill
    var quill = new Quill('#quill-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['bold', 'italic', 'underline', 'strike'], // Customize the toolbar
                ['link'],
                [{ 'align': [] }],
                ['image'],
                ['clean']
            ]
        }
    });

    // Capture Quill content and update the hidden input field
    quill.on('text-change', function() {
        var htmlContent = quill.root.innerHTML;
        document.getElementById('quill-content').value = htmlContent;
    });
</script>

@endsection

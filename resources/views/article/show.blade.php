@extends('layouts.bootstrap5') // You may need to adjust the layout

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('showByCategory', $article->Kategori->Kategori) }}">{{ $article->Kategori->Kategori }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{!! str_limit($article->title, $limit = 20) !!}</li>
            </ol>
        </nav>

        <h2>{{ $article->title }}</h2>

        <!-- Display date -->
        <p class="text-muted">Posted on {{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}</p>
        <div class="d-flex justify-content-center">
            <img class="img-fluid" height="800" src="{{ asset('storage/' . $article->gambar_article) }}"
                alt="Article Image">
        </div>
        <!-- Display Quill.js content -->
        <div class="mt-3">
            {!! $article->content !!}
        </div>
        <figure class="text-center">
            <img src="{{ asset('storage/' . $article->user->foto_guru) }}" alt="{{ $article->user->name }}"
                class="img-fluid rounded-circle img-thumbnail" width="100">
            <figcaption style="font-size: 18px; font-weight: bold;">
                {{ $article->user->name }}</figcaption>
        </figure>
    </div>

    <!-- Include Quill.js library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill on the quill-container element -->
@endsection

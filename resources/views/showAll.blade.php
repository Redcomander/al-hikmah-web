@extends('layouts.bootstrap5')

@section('content')
    <div class="container">
        <h1 class="mb-5">All Articles</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($articles as $article)
                <div class="col mb-4">
                    <div class="card">
                        <a href="{{ route('article.show', ['article' => $article->id]) }}">
                            <img src="{{ asset('storage/' . $article->gambar_article) }}" class="d-block w-100"
                                alt="{{ $article->title }}" />
                        </a>
                        <div class="card-body">
                            <a href="{{ route('article.show', ['article' => $article->id]) }}">
                                <h5>{{ $article->title }}</h5>
                            </a>
                            <p class="card-text">{!! str_limit($article->content, $limit = 120) !!}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Posted on
                                {{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}</small>
                            <br>
                            Category: {{ $article->Kategori->Kategori }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $articles->links('pagination::bootstrap-5') }} {{-- Display pagination links --}}
    </div>
@endsection

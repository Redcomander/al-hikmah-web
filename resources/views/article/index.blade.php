@extends('layouts.nav-bootstrap')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="lead">
                            <strong>
                                Article List
                            </strong>
                        </h4>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ url('article/create') }}" class="btn btn-dark">
                                <i class="bi-plus"></i> Buat
                            </a>
                            <a href="{{ url('kategori/') }}" class="btn btn-dark">
                                Daftar Kategori
                            </a>
                            <a href="{{ url('kategori/create') }}" class="btn btn-dark">
                                <i class="bi-plus"></i> Buat Kategori
                            </a>
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                        <th>Status</th>
                                        <th>Preview</th>
                                        <th>Penulis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($article as $col)
                                        <tr class="align-middle">
                                            <td>{{ $col->title }}</td>
                                            <td>{{ $col->Kategori->Kategori }}</td>
                                            <td>
                                                <a href="{{ url('article/' . $col->id . '/edit') }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="bi-pen text-white lead"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ url('article/' . $col->id) }}" method="post"
                                                    id="deleteForm{{ $col->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ $col->id }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ $col->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success" data-mdb-ripple-init
                                                    data-mdb-modal-init data-mdb-target="#previewModal{{ $col->id }}">
                                                    <i class="bi-eye text-white lead"></i>
                                                </button>
                                            </td>
                                            <td>{{ $col->user->name }}</td>
                                        </tr>

                                        {{-- Modal --}}
                                        <div class="modal fade" id="previewModal{{ $col->id }}" tabindex="-1"
                                            aria-labelledby="previewModalLabel{{ $col->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="previewModalLabel{{ $col->id }}">
                                                            Preview Article</h5>
                                                        <button type="button" class="btn-close" data-mdb-ripple-init
                                                            data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2 style="font-weight: bold; font-size: 24px;">{{ $col->title }}
                                                        </h2>
                                                        <p class="text-muted">{{ $col->created_at->format('F j, Y') }}</p>
                                                        @if ($col->gambar_article)
                                                            <img src="{{ asset('storage/' . $col->gambar_article) }}"
                                                                alt="Gambar Artikel" class="img-fluid">
                                                        @else
                                                        @endif
                                                        <!-- Add some space here -->
                                                        <div style="margin-bottom: 30px;"></div>
                                                        <!-- Display content with formatting -->
                                                        {!! $col->content !!}
                                                        <div style="margin-bottom: 20px;"></div>
                                                        <figure class="text-center">
                                                            <img src="{{ asset('storage/' . $col->user->foto_guru) }}"
                                                                alt="{{ $col->user->name }}"
                                                                class="img-fluid rounded-circle img-thumbnail"
                                                                width="100">
                                                            <figcaption style="font-size: 18px; font-weight: bold;">
                                                                {{ $col->user->name }}</figcaption>
                                                        </figure>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Modal --}}

                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <h4 class="text-center"><i class="bi-search">Article Tidak Ada</i></h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $article->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            if (window.confirm("Are you sure you want to delete this item?")) {
                // If the user clicks "OK", submit the form
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
@endsection

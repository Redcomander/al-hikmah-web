@extends('layouts.nav-bootstrap')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="lead">
                            <strong>
                                Daftar Kategori
                            </strong>
                        </h4>
                        <div class="d-flex justify-content-end gap-3">
                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th class="text-center">Hapus Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategori as $col)
                                        <tr class="align-middle">
                                            <td>{{ $col->Kategori }}</td>
                                            <td class="text-center">
                                                <form action="{{ url('kategori/' . $col->id) }}" method="post"
                                                    id="deleteForm{{ $col->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete('{{ $col->id }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <h4 class="text-center"><i class="bi-search">Kategori Tidak Ada</i></h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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

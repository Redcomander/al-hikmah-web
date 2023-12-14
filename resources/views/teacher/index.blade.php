@extends('layouts.nav-bootstrap')

@section('content')
    <style>
        /* Custom styles for the Edit and Delete buttons */
        .btn-edit {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-delete {
            background-color: #c82333;
            color: #fff;
        }

        /* Hover styles for the buttons */
        .btn-edit:hover {
            background-color: #138496;
        }

        .btn-delete:hover {
            background-color: #b51927;
        }

        /* Style for the icons inside the buttons */
        .btn i {
            font-size: 1rem;
        }

        /* Rounded image style */
        .rounded-image {
            border-radius: 50%;
            /* Makes the image circular */
            overflow: hidden;
            /* Ensures the image doesn't overflow its container */
            width: 100px;
            /* Adjust the width and height as needed */
            height: 100px;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="lead" style="color: #198754;">
                                <b> AKUN GURU </b>
                            </h4>

                            <!-- Check if the user has permission to view developer columns -->
                            <a href="{{ url('teacher/create') }}" class="btn btn-dark mb-3">
                                <i class="bi bi-plus"></i> Baru
                            </a>

                        </div>
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th scope="col" class="col-6">Nama Lengkap</th>
                                        <th>Wali Kelas</th>
                                        <th>Status Guru</th>
                                        <!-- Check if the user has permission to view developer columns -->
                                        <th>Grades</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1; // Initialize the counter
                                    @endphp
                                    @foreach ($user as $col)
                                        {{-- @php
                                            $grades = $col->getGradesAttribute()['grades_array'];
                                            $filteredGrades = array_filter($grades, function ($grade) {
                                                return $grade !== '-';
                                            });
                                            $filteredGradesString = implode(', ', $filteredGrades);
                                        @endphp --}}
                                        <tr class="align-middle">
                                            <td>{{ $counter++ }}</td>
                                            <td>
                                                @if ($col->foto_guru)
                                                    <div class="rounded-image">
                                                        <img src="{{ asset('storage/' . $col->foto_guru) }}" alt="Foto Guru"
                                                            class="img-fluid">
                                                    </div>
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $col->name }}</td>
                                            <td>{{ $col->wali_kelas }}</td>
                                            <td>{{ $col->status }}</td>

                                            <!-- Check if the user has permission to view developer columns -->
                                            <td>
                                                @if ($col->getGradesAttribute()['grade_1'] && $col->getGradesAttribute()['grade_1'] !== '-')
                                                    {{ $col->getGradesAttribute()['grade_1'] }},
                                                @endif
                                                @if ($col->getGradesAttribute()['grade_2'] && $col->getGradesAttribute()['grade_2'] !== '-')
                                                    {{ $col->getGradesAttribute()['grade_2'] }},
                                                @endif
                                                @if ($col->getGradesAttribute()['grade_3'] && $col->getGradesAttribute()['grade_3'] !== '-')
                                                    {{ $col->getGradesAttribute()['grade_3'] }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('teacher/' . $col->id . '/edit') }}" class="btn btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ url('teacher/' . $col->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-delete">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

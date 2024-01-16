@extends('layouts.nav-bootstrap')

@section('content')
    <style>
        /* Add your existing styles here */
        .rounded-image {
            border-radius: 50%;
            overflow: hidden;
            width: 100px;
            height: 100px;
        }

        div.online-indicator {
            display: inline-block;
            width: 8px;
            height: 8px;
            margin-right: 10px;
            background-color: #0fcc45;
            border-radius: 50%;
            position: relative;
        }

        span.blink {
            display: block;
            width: 8px;
            height: 8px;
            background-color: #0fcc45;
            opacity: 0.7;
            border-radius: 50%;
            animation: blink 1s linear infinite;
        }

        /* Animations */
        @keyframes blink {
            100% {
                transform: scale(2, 2);
                opacity: 0;
            }
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
                            @if (auth()->check())
                                @if (auth()->user()->hasGrade('Website Admin', 'Developer'))
                                    <a href="{{ url('teacher/create') }}" class="btn btn-dark mb-3">
                                        <i class="bi bi-plus"></i> Baru
                                    </a>
                                @endif
                            @endif
                        </div>
                        {{-- Table --}}
                        <div class="list-group">
                            @foreach ($user as $col)
                                <div class="list-group-item mb-3 shadow rounded-3">
                                    <div class="d-flex flex-column flex-md-row align-items-center">
                                        <div class="rounded-image me-md-3 mb-3 mb-md-0 text-center">
                                            @if ($col->foto_guru)
                                                <img src="{{ asset('storage/' . $col->foto_guru) }}" alt="Foto Guru"
                                                    class="img-fluid">
                                            @else
                                                No Image
                                            @endif
                                        </div>
                                        <div class="d-md-none"><!-- Hide on medium screens and above -->
                                            <livewire:online-status :userId="$col->id" :key="$col->id" />
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-heading{{ $col->id }}">
                                                        <button data-mdb-collapse-init
                                                            class="accordion-button collapsed d-flex justify-content-between gap-3 align-items-center"
                                                            type="button" data-mdb-toggle="collapse"
                                                            data-mdb-target="#flush-collapse{{ $col->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="flush-collapse{{ $col->id }}">
                                                            <span>{{ $col->name }}</span>
                                                            <div class="d-none d-md-flex align-items-center">
                                                                <livewire:online-status :userId="$col->id"
                                                                    :key="$col->id" />
                                                                {{-- <span class="accordion-arrow"></span> --}}
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapse{{ $col->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="flush-heading{{ $col->id }}"
                                                        data-mdb-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p>Wali Kelas: {{ $col->wali_kelas }}</p>
                                                            <p>Status Guru: {{ $col->status }}</p>
                                                            <p>Grades: {{ $col->grades }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="mt-3 mt-md-0 d-flex justify-content-center">
                                            <a href="{{ url('teacher/' . $col->id . '/edit') }}"
                                                class="btn btn-success me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ url('teacher/' . $col->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
@endsection

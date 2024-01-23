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
                        @livewire('teacher-index')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        function confirmDelete(id) {
            if (window.confirm("Are you sure you want to delete this item?")) {
                // If the user clicks "OK", submit the form
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
    @livewireStyles
@endsection

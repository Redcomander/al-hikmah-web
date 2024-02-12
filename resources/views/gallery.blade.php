@extends('layouts.bootstrap5')

@section('content')
    <style>
        .card-columns {
            column-count: 4;
            /* Adjust the default column count as needed for larger screens */
        }

        .w-100 {
            width: 100%;
            height: auto;
        }

        .rounded-corners {
            border-radius: 1.2rem;
            /* Adjust the border radius as needed */
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .rounded-corners:hover {
            transform: scale(1.05);
        }

        .rounded-corners:hover .overlay {
            opacity: 1;
        }

        @media (max-width: 767px) {

            /* Adjust the column count for screens up to 767px wide (typically mobile devices) */
            .card-columns {
                column-count: 2;
            }
        }
    </style>
    <div class="container mb-4">
        <livewire:gallery-index />
    </div>
@endsection

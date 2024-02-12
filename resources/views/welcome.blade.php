@extends('layouts.bootstrap5')

@section('content')
    <style>
        h2 {
            text-align: center;
        }

        h1 {
            text-align: center;
            font-size: 36px;
        }

        .paragraph-container {
            display: flex;
            justify-content: center;
        }

        .paragraph {
            width: 70%;
            /* Use the full width on small screens */
        }

        .paragraph p {
            margin-bottom: 20px;
        }

        /* Add opacity to sections initially */
        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* Add class to trigger fade-in when in viewport */
        .fade-in.active {
            opacity: 1;
        }

        .carousel-caption {
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            box-sizing: border-box;
        }

        .carousel-caption h5,
        .carousel-caption p {
            color: #fff;
            margin: 0;
        }

        .carousel-item img {
            max-width: 100%;
            /* Set the maximum width to 100% to allow scaling down */
            height: auto;
            /* Allow the height to adjust proportionally based on the width */
        }

        /* Adjust the width of the carousel control buttons */
        .carousel-control-next,
        .carousel-control-prev {
            width: 5%;
            /* Set your desired width here */
        }

        /* If you want to adjust the position of the controls */
        .carousel-control-next {
            right: 5%;
            /* Set the right position */
        }

        .carousel-control-prev {
            left: 0;
            /* Set the left position */
        }


        @media (min-width: 900px) {


            .carousel-item img {
                height: 70vh;
                object-fit: cover;
                /* Set the image height to 80% of the viewport height on desktop */
            }

            .carousel-indicators {
                top: auto;
                bottom: -15px;
                /* Adjust this value to move the indicators down */
            }
        }
    </style>

    <div class="container-fluid" style="padding: 0;">
        <div class="row">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <!-- Carousel wrapper -->
                    <div class="container mx-auto">
                        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel"
                            data-mdb-carousel-init>
                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                @foreach ($articles as $key => $article)
                                    <button type="button" data-mdb-target="#carouselBasicExample"
                                        data-mdb-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"
                                        aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            </div>

                            <!-- Inner -->
                            <div class="carousel-inner">
                                @foreach ($articles as $key => $article)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <a href="{{ route('article.show', ['article' => $article->id]) }}">
                                            <img src="{{ asset('storage/' . $article->gambar_article) }}"
                                                class="d-block w-100" alt="{{ $article->title }}" />
                                        </a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <a href="{{ route('article.show', ['article' => $article->id]) }}">
                                                <h5>{{ $article->title }}</h5>
                                            </a>
                                            <p>{{ $article->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                                data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                                data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: rgba(16, 141, 141, 1); min-height: 10vh"></div>
    <div class="row" style="min-height: 30vh;">
        <div class="col-lg-12 d-flex justify-content-evenly align-items-center">

            <!-- Three Buttons with the custom button style -->
            <a href="{{ route('showAll') }}" class="button-64 text-center" role="button">
                <span class="text">E-Jurnal</span>
            </a>
            <button class="button-64" role="button">
                <span class="text">Donasi</span>
            </button>

        </div>
    </div>
    <div class="row justify-content-center align-items-center" style="min-height: 50vh">
        <div class="col-lg-12 text-center">
            <h5 class="fade-in">Sekilas Tentang</h5>
            <h1 class="fade-in">AL-HIKMAH</h1>
            <div class="paragraph-container">
                <div class="paragraph fade-in">
                    <p class="text-ceter">
                        Pondok Modern Al-Hikmah Utan, Sumbawa, adalah lembaga pendidikan Islam yang mengadopsi Kurikulum
                        Modern Islam (KMI) dengan mengintegrasikan program Sekolah Menengah Pertama (SMP) dan Madrasah
                        Aliyah (MA). Terletak di Utan, Sumbawa, pondok modern ini bertujuan mencetak generasi muslim unggul
                        dalam ilmu pengetahuan umum dan keagamaan.
                    </p>
                    <p class="text-center">
                        Pondok Modern Al-Hikmah Utan membedakan diri dengan penekanan pada pembinaan karakter dan
                        kepemimpinan, menciptakan lingkungan pendidikan yang kondusif bagi perkembangan spiritual dan
                        intelektual siswa. Siswa-siswanya diajarkan untuk tidak hanya cerdas secara akademis, tetapi juga
                        memiliki moralitas yang tinggi.
                    </p>

                    <p class="text-center">
                        Sebagai tambahan, pondok modern ini mengimplementasikan penggunaan bahasa Arab dan Inggris dalam
                        aktivitas sehari-hari, memastikan bahwa siswa-siswinya terampil dan nyaman berkomunikasi dalam kedua
                        bahasa tersebut. Ini memberikan keunggulan tambahan bagi siswa dalam beradaptasi dengan lingkungan
                        global yang multikultural.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="news" class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <h2 class="text-center">Al-Hikmah News</h2>
        </div>

        @php
            $articles = $articles->reverse(); // Reverse the order of articles (newest first)
        @endphp

        @foreach ($articles->take(6) as $article)
            <div class="col-md-3 mb-4 mx-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $article->gambar_article) }}" class="card-img-top"
                        alt="{{ $article->title }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{!! str_limit($article->content, $limit = 120) !!}</p>
                        <a href="{{ route('article.show', ['article' => $article->id]) }}" class="btn btn-primary">Read
                            More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to handle the fade-in effect for elements in the viewport
        function handleFadeIn() {
            const elements = document.querySelectorAll('.fade-in');

            elements.forEach((element) => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;

                if (rect.top <= windowHeight * 0.75) {
                    element.classList.add('active');
                }
            });
        }

        // Attach scroll event listener to trigger the fade-in effect
        window.addEventListener('scroll', handleFadeIn);
        window.addEventListener('load', handleFadeIn); // Trigger on initial load
    </script>
    <script>
        // Initialization for ES Users
        import {
            Carousel,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Carousel
        });
    </script>
@endsection

@extends('layouts.bootstrap5')

@section('content')
    <style>
        /* Custom CSS to align caption text to the left and increase font size */
        .carousel-caption.text-left {
            text-align: left !important;
            left: 20px;
            right: auto;
        }

        .carousel-caption.text-left h5 {
            font-size: 50px;
        }

        .button-64 {
            background-color: rgba(16, 141, 141, 1);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 2px 2px;
            margin: 10px;
            cursor: pointer;
        }

        .button-64:hover {
            background-color: #108d8d;
        }

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
            text-align: justify;
        }

        .paragraph {
            width: 35%; /* Use the full width on small screens */
            margin: 0 10px; /* Reduce margin to decrease space between paragraphs */
        }

        .paragraph p {
            margin-bottom: 20px;
            text-align: justify;
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
    </style>

    <div class="container-fluid" style="padding: 0;">
        <div class="row">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
                <div class="carousel-inner">
                    @foreach ($articles as $key => $article)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $article->gambar_article) }}" class="d-block w-100 img-fluid"
                                alt="{{ $article->title }}">
                            <div class="carousel-caption d-none d-md-block text-left">
                                <h5>{{ $article->title }}</h5>
                                <p>{{ $article->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row" style="background-color: rgba(16, 141, 141, 1); min-height: 10vh"></div>
        <div class="row" style="min-height: 30vh;">
            <div class="col-lg-12 d-flex justify-content-evenly align-items-center">

                <!-- Three Buttons with the custom button style -->
                <button class="button-64" role="button">
                    <span class="text">E-Jurnal</span>
                </button>
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
                        <p id="paragraph1" contenteditable="false">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum neque id pretium
                            lobortis. Cras volutpat eget erat a luctus. Nulla ut turpis ligula. Proin at accumsan magna.
                            Vestibulum a erat porttitor, euismod diam non, viverra neque. Nulla facilisi. Sed nec mi et nibh
                            varius maximus. Integer malesuada urna non nisi efficitur efficitur. Cras id pellentesque magna.
                            Sed dui massa, lacinia id imperdiet ut, vestibulum eu sem. Pellentesque vulputate tincidunt
                            finibus. Donec blandit purus non tellus rutrum pellentesque. Nullam fringilla nibh sit amet nibh
                            sodales sagittis. Donec aliquam tincidunt nulla ac eleifend. Phasellus ut malesuada augue, in
                            pulvinar nibh.
                        </p>
                    </div>
                    <div class="paragraph fade-in">
                        <p id="paragraph2" contenteditable="false">
                            <!-- Your content here -->
                        </p>
                    </div>
                </div>
            </div>
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
        // Function to change the carousel slide every 7 seconds
        function autoChangeCarousel() {
            $('.carousel').carousel('next'); // Trigger the next slide button
        }

        // Set an interval to call the function every 7 seconds
        setInterval(autoChangeCarousel, 7000); // 7000 milliseconds = 7 seconds
    </script>
    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $('#myCarousel').carousel();

            // Listen for the 'slid.bs.carousel' event
            $('#myCarousel').on('slid.bs.carousel', function() {
                var currentIndex = $(this).find('.active').index();
                var slidesCount = $(this).find('.carousel-item').length;

                // Check if the last slide has been reached
                if (currentIndex === slidesCount - 1) {
                    // Reset the carousel to the first slide after a delay of 7 seconds
                    setTimeout(function() {
                        $('#myCarousel').carousel(0);
                    }, 7000);
                }
            });
        });
    </script>
    <script>
        function splitParagraphs() {
            var paragraph1 = document.getElementById('paragraph1');
            var paragraph2 = document.getElementById('paragraph2');
            var text = paragraph1.innerText;

            if (text.length > 50) {
                var firstPart = text.substring(0, 500);
                var secondPart = text.substring(50);

                paragraph1.innerText = firstPart;
                paragraph2.innerText = secondPart;
            }
        }

        // Call the function when the page loads and when the content of paragraph1 changes
        window.addEventListener('DOMContentLoaded', splitParagraphs);
        document.getElementById('paragraph1').addEventListener('input', splitParagraphs);
    </script>
@endsection

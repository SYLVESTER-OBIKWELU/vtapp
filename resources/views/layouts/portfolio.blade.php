<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Portfolio - Sylvester Obikwelu</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('home/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('home/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('home/img/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('home/img/site.webmanifest')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Inter font for modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="{{asset('portfolio/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" />

    <!-- Swiper CSS -->
    <link href="{{asset('portfolio/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />
    <link href="{{asset('portfolio/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" />

    <!-- Vite Assets (Tailwind CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-['Inter'] bg-slate-900 text-white antialiased">

    @include('layouts.preloader')

    @yield('content')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top-btn"><i class="bi bi-arrow-up-short text-white text-2xl"></i></a>

    {{-- Recaptchata --}}
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

    <!-- Vendor JS Files -->
    <script src="{{asset('portfolio/vendor/typed.js/typed.umd.js')}}"></script>
    <script src="{{asset('portfolio/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('portfolio/vendor/swiper/swiper-bundle.min.js')}}"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.addEventListener('alert', (event) => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: event.detail.icon,
                title: event.detail.text
            });
        });

        // Initialize Typed.js
        document.addEventListener('DOMContentLoaded', function() {
            const typed = document.querySelector('.typed');
            if (typed) {
                new Typed('.typed', {
                    strings: typed.dataset.typedItems.split(','),
                    loop: true,
                    typeSpeed: 100,
                    backSpeed: 50,
                    backDelay: 2000
                });
            }
            
            // Initialize GLightbox
            GLightbox({
                selector: '.glightbox'
            });
        });
    </script>

</body>

</html>
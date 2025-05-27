<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>{{env('APP_NAME')}}</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

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

  <!-- Vendor CSS Files -->
  <link href="{{asset('home/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('home/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('home/vendor/aos/aos.css')}}" rel="stylesheet" />
  <link href="{{asset('home/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" />
  <link href="{{asset('home/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="{{asset('home/css/main.css')}}" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  {{ $slot }}



  {{-- Sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('message'))
  @foreach (session('message') as $msg)
  <script>
    window.onload = function(){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });
        Toast.fire({
            icon: "{{$msg[2]}}",
            title: "{{$msg[1]}}",
        });
        }
  </script>
  @endforeach
  @endif

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

        function deletion(event){
            Swal.fire({
                title: "Are you sure?",
                text: "This action will removed all product and orders associated with this category!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    document.getElementById('deleteBtn').click()

                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
                }
                });
        }

        // document.addEventListener('livewire:navigated', () => {
        //     initFlowbite();
        // });

  </script>
</body>

</html>
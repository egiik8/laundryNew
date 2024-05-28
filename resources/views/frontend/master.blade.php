<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Alisha Laundry</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="theme-color" content="#6777ef"/>
  <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
  <link rel="manifest" href="{{ asset('/manifest.json') }}">

  <link href="{{asset('frontends/img/favicon.ico')}}" rel="icon">
  <link href="{{asset('frontends/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="{{asset('frontends/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/css/main.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">


  <style>
    /* Floating Message Button Styles */
    #floating-message-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }

    #floating-message-button a {
      display: block;
      background-color: #12AC1E  ;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    #floating-message-button a:hover {
      background-color: #46AD4E;
    }

    #close-button {
      position: absolute;
      top: 0;
      right: 0;
      padding-top: 0px;
      padding-right: 3px;
      cursor: pointer;
      font-size: 20px;
      color: #ECEDEC  ;
    }
  </style>
</head>

<body>
  @include('frontend.header')
  @yield('frontend')
  @include('frontend.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="floating-message-button">
  <a href="https://wa.me/+6282232340075?text=Pesan Laundry" target="_blank" class="btn btn-success">
    <i class="bi bi-whatsapp bi-lg"></i> Pesan Sekarang
  </a>
  <span id="close-button">&times;</span>
</div>


  <div id="preloader"></div>

  <script src="{{asset('frontends/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontends/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('frontends/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontends/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontends/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontends/vendor/php-email-form/validate.js')}}"></script>

  <script src="{{asset('frontends/js/main.js')}}"></script>

  <!-- JavaScript for Closing Floating Message Button -->
  <script>
    document.getElementById('close-button').addEventListener('click', function() {
      document.getElementById('floating-message-button').style.display = 'none';
    });
  </script>

  <!-- PWA -->
  <script src="{{ asset('/sw.js') }}"></script>
  <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
          console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
          console.error(`Service worker registration failed: ${error}`);
        },
      );
    } else {
      console.error("Service workers are not supported.");
    }
  </script>
</body>

</html>

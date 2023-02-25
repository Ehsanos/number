<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>numbers2</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/Ludens-Users---2-Register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/VentasPro-Login.css')}}">
</head>

<body>
<main class="main-page">
    <nav class="navbar navbar-light navbar-expand nav-style">
        <div class="container-fluid"><a href="{{route('servers')}}">
                <img class="navbar-brand" src="assets/img/sms%20sg.png"></a>
            <div class="collapse navbar-collapse d-flex justify-content-center justify-content-around nav-style" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active text-white" href="{{route('servers')}}">الرئيسية<i class="fa fa-home px-2"></i></a></li>
                    <li class="nav-item"></li>
                </ul><a class="text-decoration-none" href="balance.html">
                    <div class="account">
                        <p class="text-white text-center mb-0 fw-bold">100<i class="fa fa-dollar"></i></p>
                    </div>
                </a>
            </div>
        </div>
    </nav>
   @yield('content')
</main>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/Client-Slider-1-clients.logo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="{{asset('assets/js/slider.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('error'))
    <script>
        Swal.fire({
            title: 'خطأ!',
            text: '{{session()->get('error')}}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
    @endif
@yield('script')
</body>

</html>

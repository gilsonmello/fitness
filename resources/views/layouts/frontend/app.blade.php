<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
       
        <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('frontend/css/bootstrap-responsive.css') }}">
        <link rel="stylesheet" href="{{ url('frontend/css/custom-styles.css') }}">
        <link rel="stylesheet" href="{{ url('frontend/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('frontend/css/component.css') }}">
        <link rel="stylesheet" href="{{ url('frontend/css/font-awesome-ie7.css') }}">

        <script src="{{ url('frontend/js/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
</head>
<body>

    <!-- Cabeçalho -->
    @include('frontend.includes.header')
    <!-- Fim cabeçalho -->


    <div class="banner">
        <div class="container">
            <div class="carousel slide" id="myCarousel">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item">
                        <div class="carousel-caption">
                            <h2>hasellus ultrices nulla quis nibh</h2><br>
                            <h1>Morbi in sem quis dui placerat ornare</h1>
                            <div class="shadow"><img src="{{ url('frontend/img/shadow.png') }}" alt=""></div>
                        </div>
                        <img src="{{ url('frontend/img/banner-image.png') }}" alt="">
                    </div>
                    <div class="item">
                        <div class="carousel-caption">
                            <h2>hasellus ultrices nulla quis nibh</h2><br>
                            <h1>Morbi in sem quis dui placerat ornare</h1>
                            <div class="shadow"><img src="{{ url('frontend/img/shadow.png') }}" alt=""></div>
                        </div>
                        <img src="{{ url('frontend/img/banner-image.png') }}" alt="">
                    </div>
                    <div class="item active">
                        <div class="carousel-caption">
                            <h2>hasellus ultrices nulla quis nibh</h2><br>
                            <h1>Morbi in sem quis dui placerat ornare</h1>
                            <div class="shadow"><img src="{{ url('frontend/img/shadow.png') }}" alt=""></div>
                        </div>
                        <img src="{{ url('frontend/img/banner-image.png') }}" alt="">
                    </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="carousel-control left"><i class="fw-icon-chevron-left"></i></a>
                <a data-slide="next" href="#myCarousel" class="carousel-control right"><i class="fw-icon-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Conteúdo -->
    @yield('content')
    <!-- Fim conteúdo -->

    
    <!-- Rodapé -->
    @include('frontend.includes.footer')
    <!-- Fim rodapé -->
    

    <script src="{{ url('frontend/js/jquery-1.9.1.js') }}"></script> 
    <script src="{{ url('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ url('frontend/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('frontend/js/imagesloaded.js') }}"></script>
    <script src="{{ url('frontend/js/classie.js') }}"></script>
    <script src="{{ url('frontend/js/AnimOnScroll.js') }}"></script>
    
    <script>
        new AnimOnScroll(document.getElementById('grid'), {
            minDuration : 0.4,
            maxDuration : 0.7,
            viewportFactor : 0.2
        });
    </script>

    <script>
        $('#myCarousel').carousel({
            interval: 1800
        });
    </script>


</body>
</html>

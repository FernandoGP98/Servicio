<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
    <nav class="navbar d-block">
        <span class="navbar-brand mb-0"><h2>Demo</h2></span> <br>
        <span class="sub mx-0">Servicio social</span>
      </nav>
    <div class="container my-3">
        <div class="row">
            <section id="loading-screen">

                <div id="loader"></div>

            </section>
            <div class="col-8" id="container">
                <button class="btnConf btn" id="anterior"><<</button>
                <canvas id="idCanvas">

                </canvas>

                <button class="btnConf btn" id="siguiente">>></button>
            </div>
            <div class="col-4 px-0" id="planos">
                <div class="respuestas">
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive" id="0" src="assets\Imagenes\1.PNG"
                        height="250px" width="auto">
                    </div>

                    <div class="d-flex justify-content-center">
                        <img id="1" src="assets\Imagenes\2.PNG"
                        height="250px" width="auto">
                    </div>
                </div>
                <div class="col-12 px-0 d-flex justify-content-center">
                    <button class="btn mx-1" id="prev">Anterior</button>
                    <button class="btn mx-1" id="sig">Siguiente</button>
                </div>
                <div class="col-12 py-2 px-0 d-flex justify-content-center">
                    <button class="btn mx-1" id="aceptar">Aceptar</button>
                </div>

            </div>
        </div>
    </div>

    <script type="module" src="/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.respuestas').slick({
            speed: 700,
            autoplay:false,
            slidesToShow: 1,
            slidesToScroll: 1,
            nextArrow: "#sig",
            prevArrow: "#prev",

          });
        });
      </script>
</body>
</html>

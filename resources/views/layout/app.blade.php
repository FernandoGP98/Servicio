<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-md">
        <div class="navbar-collapse collapse order-0 order-md-0 dual-collapse2">
            <a class="navbar-brand mb-0" href="/"> <img class="mb-lg-3" width="18%" height="auto" src="\imagenes\Uanl.png" alt=""> <br><span class="sub"
                style="font-size: 12px;">CAEC 303<br> “Investigación y Visualización Matemática en Innovación Educativa 2020"</span></a>
        </div>
        <div class="mx-auto order-1">
            <div class="text-center">
                <span class="sub mx-0">Universidad Autonoma de Nuevo Leon</span>
                <hr class="my-1" style="border-top: 1px solid white;">
                <span class="sub mx-0">Facultad de Ciencias Físico Matemáticas</span>
            </div>
        </div>
        <div class="navbar-collapse collapse order-2">
            <ul>
           <li style="list-style-type:none; text-align:right;"><img class="mb-lg-3 pull-right" src="\imagenes\FCFM_Bisonte.png" alt="" srcset="" width="18%" height="auto"><br><span>
               VERSION 1.0
           </span></li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/"><img width="100$" height="auto" src="\imagenes\background-02-01.jpg" alt=""> <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown d-flex align-items-end {{ request()->is('geometrias*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Geo-Datos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ url('/geometrias/redondos') }}">Cuerpos redondos</a>
                  <a class="dropdown-item" href="{{ url('/geometrias/piramides') }}">Piramides</a>
                  <a class="dropdown-item" href="{{ url('/geometrias/prismas') }}">Prismas</a>
                </div>
              </li>
              <li class="nav-item dropdown d-flex align-items-end {{ request()->is('intersecciones*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Intersecciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/intersecciones/cilindros') }}">Cilindro</a>
                    <a class="dropdown-item" href="{{ url('/intersecciones/parabolas') }}">Parabola</a>
                </div>
              </li>
              <li class="nav-item dropdown d-flex align-items-end {{ request()->is('extras*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Extras
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/extras/bisonte') }}">Bisonte</a>
                    <a class="dropdown-item" href="{{ url('/extras/solar') }}">Sistema Solar</a>
                    <a class="dropdown-item" href="{{ url('/extras/hubble') }}">Hubble</a>
                </div>
              </li>
              <li class="nav-item d-flex align-items-end {{ request()->is('creditos*') ? 'active' : '' }}">
                <a class="nav-link" href="/creditos"  aria-expanded="false">
                  Creditos
                </a>
              </li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>

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


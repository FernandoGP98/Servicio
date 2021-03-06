@extends('layout.app')
@section('content')
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
                    <img class="imgForModal" id="0" src="\imagenes\imagenes_intersecciones\cilindro_cilindro.png"
                    height="250px" width="auto" alt="cilindros">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="1" src="\imagenes\imagenes_intersecciones\cilindro_cono.png"
                    height="250px" width="auto" alt="cilindro y cono">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="2" src="\imagenes\imagenes_intersecciones\cilindro_parabola.png"
                    height="250px" width="auto" alt="cilindro y parabola">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="3" src="\imagenes\imagenes_intersecciones\cilParabolico_cilParabolico_Y.png"
                    height="250px" width="auto" alt="cilindros parabolicos en Y">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="4" src="\imagenes\imagenes_intersecciones\parabola_plano_X.png"
                    height="250px" width="auto" alt="parabola y plano en X">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="5" src="\imagenes\imagenes_intersecciones\plano_elipsoide.PNG"
                    height="250px" width="auto" alt="plano y elipsoide">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="6" src="\imagenes\imagenes_intersecciones\cono_exp.png"
                    height="250px" width="auto" alt="cono exp">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="6" src="\imagenes\imagenes_intersecciones\parabola_valabs.png"
                    height="250px" width="auto"  alt="parabola ValAbs">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="7" src="\imagenes\imagenes_intersecciones\cilParabolico_cilParabolico_X.png"
                    height="250px" width="auto" alt="cilindros parabolicos en Y">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="8" src="\imagenes\imagenes_intersecciones\parabolico_cubico.png"
                    height="250px" width="auto" alt="parabolico y cubico">
                </div>
                <div class="d-flex justify-content-center">
                    <img class="imgForModal" id="9" src="\imagenes\imagenes_intersecciones\trigo.png"
                    height="250px" width="auto" alt="plano y trigo">
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
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
  </div>
<script type="module" src="/js/superficies.js"></script>
@endsection
@section('scripts')
<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = $('.imgForModal');
    var modalImg = $("#img01");
    var captionText = document.getElementById("caption");
    img.click(function(){
        modal.style.display = "block";
        var newSrc = this.src;
        modalImg.attr('src', newSrc);
        captionText.innerHTML = this.alt;
    });
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
@endsection

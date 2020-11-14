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
                    <img class="img-responsive" id="0" src="\assets\Imagenes\1.PNG"
                    height="250px" width="auto">
                </div>

                <div class="d-flex justify-content-center">
                    <img id="1" src="\assets\Imagenes\2.PNG"
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
<script type="module" src="/js/parabolas.js"></script>
@endsection

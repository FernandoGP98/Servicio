@extends('layout.app')
@section('content')
<div class="container my-3">
    <div class="row">
        <section id="loading-screen">

            <div id="loader"></div>

        </section>

        <div class="col-lg-12" id="container">
            <canvas id="idCanvas">

            </canvas>
        </div>

    </div>
</div>
<script type="module" src="/js/main.js"></script>
@endsection



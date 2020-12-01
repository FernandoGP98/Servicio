<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Routing extends Controller
{
    public function index(){
        return view('index');
    }

    public function creditos(){
        return view('creditos');
    }

    public function extras($a){
        switch ($a) {
            case 'bisonte':
                return view('bisonte');
                break;

            case 'solar':
                return view('solar');
                break;
            case 'hubble':
                return view('hubble');
                break;
        }
    }

    public function genericos($a){
        switch ($a) {
            case 'postgrado':
                return view('postgrado');
                break;
            case 'logo_MM':
                return view('logo_MM');
            break;
            case 'logo_LL':
                return view('logo_LL');
            break;
        }
    }

    public function superficies(){
        return view('superficies');
    }

    public function plano_inclinado(){
        return view('plano_inclinado');
    }

    public function cilindro(){
        return view('cilindro');
    }

    public function cono(){
        return view('cono');
    }

    public function redondos(){
        return view('redondos');
    }

    public function piramides(){
        return view('piramides');
    }

    public function prismas(){
        return view('prismas');
    }
}

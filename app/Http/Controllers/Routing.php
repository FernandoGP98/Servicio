<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Routing extends Controller
{
    public function index(){
        return view('index');
    }

    public function cilindros(){
        return view('cilindros');
    }

    public function parabolas(){
        return view('parabolas');
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routing;

Route::get('/', [Routing::class, 'index']);
Route::get('/intersecciones/cilindros', [Routing::class, 'cilindros']);
Route::get('/intersecciones/parabolas', [Routing::class, 'parabolas']);

Route::get('/geometrias/redondos', [Routing::class, 'redondos']);
Route::get('/geometrias/piramides', [Routing::class, 'piramides']);
Route::get('/geometrias/prismas', [Routing::class, 'prismas']);

Route::get('/creditos', [Routing::class, 'creditos']);

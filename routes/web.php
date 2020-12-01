<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routing;

Route::get('/', [Routing::class, 'index']);
Route::get('/intersecciones/superficies', [Routing::class, 'superficies']);
Route::get('/intersecciones/plano_inclinado', [Routing::class, 'plano_inclinado']);

Route::get('/geometrias/cilindro', [Routing::class, 'cilindro']);
Route::get('/geometrias/cono', [Routing::class, 'cono']);
Route::get('/geometrias/redondos', [Routing::class, 'redondos']);
Route::get('/geometrias/piramides', [Routing::class, 'piramides']);
Route::get('/geometrias/prismas', [Routing::class, 'prismas']);

Route::get('/creditos', [Routing::class, 'creditos']);
Route::get('/extras/{a}', [Routing::class, 'extras']);
Route::get('/genericos/{a}', [Routing::class, 'genericos']);


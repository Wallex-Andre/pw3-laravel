<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/painel', function () {
    return view('painel', [ 'horaAcesso' => now()->format('H:i:s')]);
})->middleware('horario.comercial');

Route::get('/fora-do-horario', function () {
    return view('fora-horario');
})->name('fora.horario');
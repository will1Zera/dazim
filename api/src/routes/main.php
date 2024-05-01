<?php

use App\Http\Route;

// Criação das rotas da aplicação

Route::get('/', 'HomeController@index');

// USUÁRIOS
Route::post('/users/create', 'UserController@create');
Route::post('/users/login', 'UserController@login');
Route::get('/users/fetch', 'UserController@fetch');
Route::put('/users/update', 'UserController@update');
Route::delete('/users/delete/{id}', 'UserController@delete');

// GÊNEROS
Route::get('/generos', 'GeneroController@index');
Route::get('/generos/fetch/{id}', 'GeneroController@fetch');
Route::post('/generos/create', 'GeneroController@create');
Route::put('/generos/update/{id}', 'GeneroController@update');
Route::delete('/generos/delete/{id}', 'GeneroController@delete');

// ETNIAS
Route::get('/etnias', 'EtniaController@index');
Route::get('/etnias/fetch/{id}', 'EtniaController@fetch');
Route::post('/etnias/create', 'EtniaController@create');
Route::put('/etnias/update/{id}', 'EtniaController@update');
Route::delete('/etnias/delete/{id}', 'EtniaController@delete');

// TURNOS
Route::get('/turnos', 'TurnoController@index');
Route::get('/turnos/fetch/{id}', 'TurnoController@fetch');
Route::post('/turnos/create', 'TurnoController@create');
Route::put('/turnos/update/{id}', 'TurnoController@update');
Route::delete('/turnos/delete/{id}', 'TurnoController@delete');

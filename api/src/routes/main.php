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

// TIPO RESIDÊNCIAS
Route::get('/tipo_residencias', 'TipoResidenciaController@index');
Route::get('/tipo_residencias/fetch/{id}', 'TipoResidenciaController@fetch');
Route::post('/tipo_residencias/create', 'TipoResidenciaController@create');
Route::put('/tipo_residencias/update/{id}', 'TipoResidenciaController@update');
Route::delete('/tipo_residencias/delete/{id}', 'TipoResidenciaController@delete');

// TIPO PARENTESCOS
Route::get('/tipo_parentescos', 'TipoParentescoController@index');
Route::get('/tipo_parentescos/fetch/{id}', 'TipoParentescoController@fetch');
Route::post('/tipo_parentescos/create', 'TipoParentescoController@create');
Route::put('/tipo_parentescos/update/{id}', 'TipoParentescoController@update');
Route::delete('/tipo_parentescos/delete/{id}', 'TipoParentescoController@delete');

// ESCOLAS
Route::get('/escolas', 'EscolaController@index');
Route::get('/escolas/fetch/{id}', 'EscolaController@fetch');
Route::post('/escolas/create', 'EscolaController@create');
Route::put('/escolas/update/{id}', 'EscolaController@update');
Route::delete('/escolas/delete/{id}', 'EscolaController@delete');

// TURMAS
Route::get('/turmas', 'TurmaController@index');
Route::get('/turmas/fetch/{id}', 'TurmaController@fetch');
Route::post('/turmas/create', 'TurmaController@create');
Route::put('/turmas/update/{id}', 'TurmaController@update');
Route::delete('/turmas/delete/{id}', 'TurmaController@delete');

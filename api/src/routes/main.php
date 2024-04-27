<?php

use App\Http\Route;

// Criação das rotas da aplicação

Route::get('/', 'HomeController@index');

// USUÁRIOS
Route::post('/users/create', 'UserController@create');
Route::post('/users/login', 'UserController@login');
Route::get('/users/fetch', 'UserController@fetch');
Route::put('/users/update', 'UserController@update');
Route::delete('/users/{id}/delete', 'UserController@delete');

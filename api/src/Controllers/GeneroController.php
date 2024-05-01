<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\GeneroService;

class GeneroController
{
    /**
    * Método responsável por buscar gêneros.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $generoService = generoService::index($authorization);

        if (isset($generoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['unauthorized']
            ], 401);
        }

        if (isset($generoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $generoService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um gênero.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $generoService = generoService::fetch($authorization, $id[0]);

        if (isset($generoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['unauthorized']
            ], 401);
        }

        if (isset($generoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $generoService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de um novo gênero.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $generoService = generoService::create($authorization, $body);

        if (isset($generoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $generoService
        ], 201);
    }

    /**
    * Método responsável por atualizar um gênero.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $generoService = generoService::update($authorization, $body, $id[0]);

        if (isset($generoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['unauthorized']
            ], 401);
        }

        if (isset($generoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $generoService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um gênero.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $generoService = generoService::delete($authorization, $id[0]);

        if (isset($generoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['unauthorized']
            ], 401);
        }

        if (isset($generoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $generoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $generoService
        ], 200);
        return;
    }
}
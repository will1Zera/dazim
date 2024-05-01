<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\EscolaService;

class EscolaController
{
    /**
    * Método responsável por buscar escolas.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $escolaService = escolaService::index($authorization);

        if (isset($escolaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['unauthorized']
            ], 401);
        }

        if (isset($escolaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $escolaService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar uma escola.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $escolaService = escolaService::fetch($authorization, $id[0]);

        if (isset($escolaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['unauthorized']
            ], 401);
        }

        if (isset($escolaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $escolaService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de uma nova escola.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $escolaService = escolaService::create($authorization, $body);

        if (isset($escolaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $escolaService
        ], 201);
    }

    /**
    * Método responsável por atualizar uma escola.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $escolaService = escolaService::update($authorization, $body, $id[0]);

        if (isset($escolaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['unauthorized']
            ], 401);
        }

        if (isset($escolaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $escolaService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover uma escola.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $escolaService = escolaService::delete($authorization, $id[0]);

        if (isset($escolaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['unauthorized']
            ], 401);
        }

        if (isset($escolaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $escolaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $escolaService
        ], 200);
        return;
    }
}
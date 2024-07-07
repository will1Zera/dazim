<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\TipoParentescoService;

class TipoParentescoController implements ControllerInterface
{
    /**
    * Método responsável por buscar tipos de parentesco.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $tipoParentescoService = tipoParentescoService::index($authorization);

        if (isset($tipoParentescoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['unauthorized']
            ], 401);
        }

        if (isset($tipoParentescoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $tipoParentescoService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um tipo de parentesco.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $tipoParentescoService = tipoParentescoService::fetch($authorization, $id[0]);

        if (isset($tipoParentescoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['unauthorized']
            ], 401);
        }

        if (isset($tipoParentescoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $tipoParentescoService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de um novo tipo de parentesco.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $tipoParentescoService = tipoParentescoService::create($authorization, $body);

        if (isset($tipoParentescoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['unauthorized']
            ], 401);
        }

        if (isset($tipoParentescoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoParentescoService
        ], 201);
    }

    /**
    * Método responsável por atualizar um tipo de parentesco.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $tipoParentescoService = tipoParentescoService::update($authorization, $body, $id[0]);

        if (isset($tipoParentescoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['unauthorized']
            ], 401);
        }

        if (isset($tipoParentescoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoParentescoService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um tipo de parentesco.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $tipoParentescoService = tipoParentescoService::delete($authorization, $id[0]);

        if (isset($tipoParentescoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['unauthorized']
            ], 401);
        }

        if (isset($tipoParentescoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoParentescoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoParentescoService
        ], 200);
        return;
    }
}
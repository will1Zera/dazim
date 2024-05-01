<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\TipoResidenciaService;

class TipoResidenciaController
{
    /**
    * Método responsável por buscar tipos de residência.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $tipoResidenciaService = tipoResidenciaService::index($authorization);

        if (isset($tipoResidenciaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['unauthorized']
            ], 401);
        }

        if (isset($tipoResidenciaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $tipoResidenciaService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um tipo de residência.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $tipoResidenciaService = tipoResidenciaService::fetch($authorization, $id[0]);

        if (isset($tipoResidenciaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['unauthorized']
            ], 401);
        }

        if (isset($tipoResidenciaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $tipoResidenciaService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de um novo tipo de residência.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $tipoResidenciaService = tipoResidenciaService::create($authorization, $body);

        if (isset($tipoResidenciaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoResidenciaService
        ], 201);
    }

    /**
    * Método responsável por atualizar um tipo de residência.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $tipoResidenciaService = tipoResidenciaService::update($authorization, $body, $id[0]);

        if (isset($tipoResidenciaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['unauthorized']
            ], 401);
        }

        if (isset($tipoResidenciaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoResidenciaService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um tipo de residência.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $tipoResidenciaService = tipoResidenciaService::delete($authorization, $id[0]);

        if (isset($tipoResidenciaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['unauthorized']
            ], 401);
        }

        if (isset($tipoResidenciaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $tipoResidenciaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $tipoResidenciaService
        ], 200);
        return;
    }
}
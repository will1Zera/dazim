<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\TurnoService;

class TurnoController implements ControllerInterface
{
    /**
    * Método responsável por buscar turnos.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $turnoService = turnoService::index($authorization);

        if (isset($turnoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['unauthorized']
            ], 401);
        }

        if (isset($turnoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $turnoService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um turno.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $turnoService = turnoService::fetch($authorization, $id[0]);

        if (isset($turnoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['unauthorized']
            ], 401);
        }

        if (isset($turnoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $turnoService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de um novo turno.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $turnoService = turnoService::create($authorization, $body);

        if (isset($turnoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turnoService
        ], 201);
    }

    /**
    * Método responsável por atualizar um turno.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $turnoService = turnoService::update($authorization, $body, $id[0]);

        if (isset($turnoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['unauthorized']
            ], 401);
        }

        if (isset($turnoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turnoService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um turno.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $turnoService = turnoService::delete($authorization, $id[0]);

        if (isset($turnoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['unauthorized']
            ], 401);
        }

        if (isset($turnoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turnoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turnoService
        ], 200);
        return;
    }
}
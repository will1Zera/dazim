<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\TurmaService;

class TurmaController implements ControllerInterface
{
    /**
    * Método responsável por buscar turmas.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $turmaService = turmaService::index($authorization);

        if (isset($turmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['unauthorized']
            ], 401);
        }

        if (isset($turmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $turmaService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar uma turma.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $turmaService = turmaService::fetch($authorization, $id[0]);

        if (isset($turmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['unauthorized']
            ], 401);
        }

        if (isset($turmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $turmaService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de uma nova turma.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $turmaService = turmaService::create($authorization, $body);

        if (isset($turmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['unauthorized']
            ], 401);
        }

        if (isset($turmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turmaService
        ], 201);
    }

    /**
    * Método responsável por atualizar uma turma.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $turmaService = turmaService::update($authorization, $body, $id[0]);

        if (isset($turmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['unauthorized']
            ], 401);
        }

        if (isset($turmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turmaService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover uma turma.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $turmaService = turmaService::delete($authorization, $id[0]);

        if (isset($turmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['unauthorized']
            ], 401);
        }

        if (isset($turmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $turmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $turmaService
        ], 200);
        return;
    }
}
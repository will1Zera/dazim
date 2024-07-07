<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\AlunoTurmaService;

class AlunoTurmaController implements ControllerInterface
{
    /**
    * Método responsável por buscar turmas.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $alunoTurmaService = alunoTurmaService::index($authorization);

        if (isset($alunoTurmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['unauthorized']
            ], 401);
        }

        if (isset($alunoTurmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $alunoTurmaService
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

        $alunoTurmaService = alunoTurmaService::fetch($authorization, $id[0]);

        if (isset($alunoTurmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['unauthorized']
            ], 401);
        }

        if (isset($alunoTurmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $alunoTurmaService
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

        $alunoTurmaService = alunoTurmaService::create($authorization, $body);

        if (isset($alunoTurmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoTurmaService
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

        $alunoTurmaService = alunoTurmaService::update($authorization, $body, $id[0]);

        if (isset($alunoTurmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['unauthorized']
            ], 401);
        }

        if (isset($alunoTurmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoTurmaService
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

        $alunoTurmaService = alunoTurmaService::delete($authorization, $id[0]);

        if (isset($alunoTurmaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['unauthorized']
            ], 401);
        }

        if (isset($alunoTurmaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoTurmaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoTurmaService
        ], 200);
        return;
    }
}
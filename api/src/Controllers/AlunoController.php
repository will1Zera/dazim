<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\AlunoService;

class AlunoController implements ControllerInterface
{
    /**
    * Método responsável por buscar alunos.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $alunoService = alunoService::index($authorization);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $alunoService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um aluno.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $alunoService = alunoService::fetch($authorization, $id[0]);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $alunoService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de um novo aluno.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $alunoService = alunoService::create($authorization, $body);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoService
        ], 201);
    }

    /**
    * Método responsável por atualizar um aluno.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $alunoService = alunoService::update($authorization, $body, $id[0]);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um aluno.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $alunoService = alunoService::delete($authorization, $id[0]);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $alunoService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar alunos aniversariantes.
    *
    * @return array Response.
    */
    public function birthday(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $alunoService = alunoService::birthday($authorization);

        if (isset($alunoService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['unauthorized']
            ], 401);
        }

        if (isset($alunoService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $alunoService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $alunoService
        ], 200);
        return;
    }
}
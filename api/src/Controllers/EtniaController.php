<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\EtniaService;

class EtniaController implements ControllerInterface
{
    /**
    * Método responsável por buscar etnias.
    *
    * @return array Response.
    */
    public function index(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $etniaService = etniaService::index($authorization);

        if (isset($etniaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['unauthorized']
            ], 401);
        }

        if (isset($etniaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $etniaService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar uma etnia.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $etniaService = etniaService::fetch($authorization, $id[0]);

        if (isset($etniaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['unauthorized']
            ], 401);
        }

        if (isset($etniaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'data' => $etniaService
        ], 200);
        return;
    }

    /**
    * Método responsável por chamar a criação de uma nova etnia.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $etniaService = etniaService::create($authorization, $body);

        if (isset($etniaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['unauthorized']
            ], 401);
        }

        if (isset($etniaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $etniaService
        ], 201);
    }

    /**
    * Método responsável por atualizar uma etnia.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $etniaService = etniaService::update($authorization, $body, $id[0]);

        if (isset($etniaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['unauthorized']
            ], 401);
        }

        if (isset($etniaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $etniaService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover uma etnia.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $etniaService = etniaService::delete($authorization, $id[0]);

        if (isset($etniaService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['unauthorized']
            ], 401);
        }

        if (isset($etniaService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $etniaService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $etniaService
        ], 200);
        return;
    }
}
<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserService;

class UserController
{
    /**
    * Método responsável por chamar a criação de um novo usuário.
    *
    * @return array Response.
    */
    public function create(Request $request, Response $response)
    {
        $body = $request::body();

        $userService = UserService::create($body);

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $userService
        ], 201);
    }

    /**
    * Método responsável por chamar a autenticação de um usuário.
    *
    * @return array Response.
    */
    public function login(Request $request, Response $response)
    {
        $body = $request::body();

        $userService = UserService::auth($body);

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'jwt' => $userService
        ], 200);
        return;
    }

    /**
    * Método responsável por buscar um usuário.
    *
    * @return array Response.
    */
    public function fetch(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $userService = UserService::fetch($authorization);

        if (isset($userService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['unauthorized']
            ], 401);
        }

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'jwt' => $userService
        ], 200);
        return;
    }

    /**
    * Método responsável por atualizar um usuário.
    *
    * @return array Response.
    */
    public function update(Request $request, Response $response)
    {
        $authorization = $request::authorization();

        $body = $request::body();

        $userService = UserService::update($authorization, $body);

        if (isset($userService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['unauthorized']
            ], 401);
        }

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $userService
        ], 200);
        return;
    }

    /**
    * Método responsável por remover um usuário.
    *
    * @return array Response.
    */
    public function delete(Request $request, Response $response, array $id)
    {
        $authorization = $request::authorization();

        $userService = UserService::delete($authorization, $id[0]);

        if (isset($userService['unauthorized'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['unauthorized']
            ], 401);
        }

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => $userService
        ], 200);
        return;
    }
}
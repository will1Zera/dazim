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
    public function store(Request $request, Response $response)
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

    public function update(Request $request, Response $response)
    {
        
    }

    public function remove(Request $request, Response $response, array $id)
    {
        
    }
}
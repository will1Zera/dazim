<?php

namespace App\Http;

class Request
{
    /**
    * Método estático responsável por fornecer o método presente na requisição.
    *
    * @return string Método(method).
    */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
    * Método estático responsável por fornecer o corpo presente na requisição.
    *
    * @return array Corpo(body).
    */
    public static function body()
    {
        $json = json_decode(file_get_contents('php://input'), true) ?? [];

        $data = match(self::method()) {
            'GET' => $_GET,
            'POST', 'PUT', 'DELETE' => $json,
        };

        return $data;
    }

    /**
    * Método estático responsável por fornecer o header presente na requisição.
    *
    * @return array Header.
    */
    public static function authorization()
    {
        $authorization = getallheaders();

        if (!isset($authorization['Authorization'])) return ['error' => 'Nenhum token presente no header.'];

        $authorizationPartials = explode(' ', $authorization['Authorization']);

        if (count($authorizationPartials) != 2) return ['error' => 'Token fornecido no header é inválido.'];

        return $authorizationPartials[1] ?? '';
    }
}
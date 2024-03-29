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
}
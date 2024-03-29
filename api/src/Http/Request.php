<?php

namespace App\Http;

class Request
{
    /**
    * Método estático responsável por fornecer o método presente na requisição.
    *
    * @return string Requisição(Request).
    */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
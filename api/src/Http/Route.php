<?php

namespace App\Http;

class Route
{
    private static array $routes = [];

    /**
    * Métodos estáticos genéricos de api para as rotas.
    * 
    * @param string $path Caminho da rota, ex: /users.
    * @param string $action Ação da rota, ex: UserController@index.
    */

    public static function get(string $path, string $action)
    {
        self::$routes[] = [
            'path'   => $path,
            'action' => $action,
            'method' => 'GET',
        ];
    }

    public static function post(string $path, string $action)
    {
        self::$routes[] = [
            'path'   => $path,
            'action' => $action,
            'method' => 'POST',
        ];
    }

    public static function put(string $path, string $action)
    {
        self::$routes[] = [
            'path'   => $path,
            'action' => $action,
            'method' => 'PUT',
        ];
    }

    public static function delete(string $path, string $action)
    {
        self::$routes[] = [
            'path'   => $path,
            'action' => $action,
            'method' => 'DELETE',
        ];
    }

    /**
    * Método estático responsável pelas rotas.
    *
    * @return array Conjunto de rotas.
    */

    public static function routes()
    {
        return self::$routes;
    }
}
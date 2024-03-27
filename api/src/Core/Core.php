<?php

namespace App\Core;

class Core
{
    /**
    * Método estático responsável por interpretar e montar a rota, redirecionando para o método do controller.
    * 
    * @param array $routes Conjunto de rotas.
    */

    public static function dispath(array $routes)
    {
        $url = '/';

        isset($_GET['url']) && $url = $_GET['url'];

        $prefixController = 'App\\Controllers\\';

        foreach ($routes as $route) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                [$controller, $action] = explode('@', $route['action']);

                $controller = $prefixController . $controller;
                $extendController = new $controller();
                $extendController->$action();
            }
        }
    }
}
<?php

namespace App\Core;

use App\Http\Request;
use App\Http\Response;

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

        isset($_GET['url']) && $url .= $_GET['url'];

        $url !== '/' && $url = rtrim($url, '/');

        $prefixController = 'App\\Controllers\\';

        $routeFound = false;

        foreach ($routes as $route) {
            $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route['path']) . '$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routeFound = true;

                // Verifica se o método mandado na requisição é o mesmo que definido na rota
                if ($route['method'] !== Request::method()) {
                    Response::json([
                        'error' => true,
                        'success' => false,
                        'message' => 'Método não encontrado.'
                    ], 405);
                    return;
                }

                [$controller, $action] = explode('@', $route['action']);

                $controller = $prefixController . $controller;
                $extendController = new $controller();
                $extendController->$action(new Request, new Response, $matches);
            }
        }

        // Verifica se encontrou a rota
        if (!$routeFound) {
            $controller = $prefixController . 'NotFoundController';
            $extendController = new $controller();
            $extendController->index(new Request, new Response);
        }
    }
}
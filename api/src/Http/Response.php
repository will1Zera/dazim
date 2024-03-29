<?php

namespace App\Http;

class Response
{
    /**
    * Método estático responsável por fornecer a resposta como json.
    *
    * @param array $data Conjunto de dados.
    * @param int $status Status da resposta.
    */
    public static function json(array $data = [], int $status = 200)
    {
        http_response_code($status);

        header("Content-Type: application/json");

        echo json_encode($data);
    }
}
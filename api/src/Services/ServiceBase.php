<?php

namespace App\Services;

use App\Http\JWT;
use Exception;
use PDOException;

abstract class ServiceBase
{
    /**
    * Método para verificar autorização.
    *
    * @param mixed $authorization Token.
    *
    * @return mixed User or error.
    */
    protected static function checkAuthorization(mixed $authorization)
    {
        if (isset($authorization['error'])) {
            return ['unauthorized' => $authorization['error']];
        }

        $userFromJWT = JWT::verify($authorization);

        if (!$userFromJWT) {
            return ['unauthorized' => 'Realize o login para acessar esse recurso.'];
        }

        return $userFromJWT;
    }

    /**
    * Método para tratar exceções de banco de dados.
    *
    * @param PDOException $e Exceção de PDO.
    *
    * @return array Erro formatado.
    */
    protected static function handlePDOException(PDOException $e)
    {
        if ($e->errorInfo[0] === 'HY000') {
            return ['error' => 'Não foi possível conectar ao banco de dados.'];
        }
        if ($e->errorInfo[0] === 'HY093') {
            return ['error' => 'Não foi possível encontrar a tabela.'];
        }
        if ($e->errorInfo[0] === '23000') {
            return ['error' => 'Não foi possível criar a conta, e-mail já está em uso.'];
        }
        return ['error' => $e->getMessage()];
    }

    /**
    * Método para tratar exceções genéricas.
    *
    * @param Exception $e Exceção genérica.
    *
    * @return array Erro formatado.
    */
    protected static function handleException(Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

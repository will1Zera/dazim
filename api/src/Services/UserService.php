<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;


class UserService
{
    /**
    * Método estático responsável por criar um novo usuário.
    *
    * @param array $data Conjunto de dados.
    *
    * @return array Response.
    */
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? '',
            ]);

            return $fields;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
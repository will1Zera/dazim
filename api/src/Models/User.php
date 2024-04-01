<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
    /**
    * Método estático responsável por savlar um usuário.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }
}
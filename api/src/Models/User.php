<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
    /**
    * Método estático responsável por salvar um usuário.
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

    /**
    * Método estático responsável por autenticar um usuário.
    *
    * @param object $data Conjunto de dados.
    *
    * @return array Dados.
    */
    public static function authentication(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                users 
            WHERE
                email = ?
        ");

        $stmt->execute([
            $data['email'],
        ]);

        if ($stmt->rowCount() < 1) return false;

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!password_verify($data['password'], $user['password'])) return false;

        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ];
    }

    /**
    * Método estático responsável por buscar um usuário.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do usuário.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, name, email
            FROM
                users 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por atualizar um usuário.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados do usuário.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                users
            SET
                name = ? 
            WHERE
                id = ?
        ");

        $stmt->execute([$data['name'], $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar um usuário.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do usuário.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                users
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
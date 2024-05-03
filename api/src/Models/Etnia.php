<?php

namespace App\Models;

use App\Models\Database;

class Etnia extends Database
{
    /**
    * Método estático responsável por buscar etnias.
    *
    * @return array Dados das etnias.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                imdaz_etnias 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar uma etnia.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da etnia.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome
            FROM
                imdaz_etnias 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por salvar uma etnia.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO imdaz_etnias (nome)
            VALUES (?)
        ");

        $stmt->execute([
            $data['nome'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar uma etnia.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados da etnia.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                imdaz_etnias
            SET
                nome = ? 
            WHERE
                id = ?
        ");

        $stmt->execute([$data['nome'], $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar uma etnia.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da etnia.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                imdaz_etnias
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
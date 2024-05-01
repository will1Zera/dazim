<?php

namespace App\Models;

use App\Models\Database;

class Genero extends Database
{
    /**
    * Método estático responsável por buscar gêneros.
    *
    * @return array Dados dos gêneros.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                imdaz_generos 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar um gênero.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do gênero.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome
            FROM
                imdaz_generos 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por savlar um gênero.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO imdaz_generos (nome)
            VALUES (?)
        ");

        $stmt->execute([
            $data['nome'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar um gênero.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados do gênero.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                imdaz_generos
            SET
                nome = ? 
            WHERE
                id = ?
        ");

        $stmt->execute([$data['nome'], $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar um gênero.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do gênero.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                imdaz_generos
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
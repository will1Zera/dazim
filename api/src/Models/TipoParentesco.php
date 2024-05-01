<?php

namespace App\Models;

use App\Models\Database;

class TipoParentesco extends Database
{
    /**
    * Método estático responsável por buscar tipos de parentescos.
    *
    * @return array Dados dos tipos de parentescos.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                imdaz_tipo_parentescos 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar um tipo de parentesco.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do tipo de parentesco.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome
            FROM
                imdaz_tipo_parentescos 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por salvar um tipo de parentesco.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO imdaz_tipo_parentescos (nome)
            VALUES (?)
        ");

        $stmt->execute([
            $data['nome'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar um tipo de parentesco.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados do tipo de parentesco.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                imdaz_tipo_parentescos
            SET
                nome = ? 
            WHERE
                id = ?
        ");

        $stmt->execute([$data['nome'], $id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar um tipo de parentesco.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do tipo de parentesco.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                imdaz_tipo_parentescos
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
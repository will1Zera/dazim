<?php

namespace App\Models;

use App\Models\Database;

class Turma extends Database
{
    /**
    * Método estático responsável por buscar turmas.
    *
    * @return array Dados das turmas.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                imdaz_turmas 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar uma turma.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da turma.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome, ano, turno_id
            FROM
                imdaz_turmas 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por savlar uma turma.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO imdaz_turmas (nome, ano, turno_id)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
            $data['nome'],
            $data['ano'],
            $data['turno_id']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar uma turma.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados da turma.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                imdaz_turmas
            SET
                nome = ?,
                ano = ?,
                turno_id = ?
            WHERE
                id = ?
        ");

        $stmt->execute([
            $data['nome'],
            $data['ano'],
            $data['turno_id'],
            $id
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar uma turma.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da turma.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                imdaz_turmas
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
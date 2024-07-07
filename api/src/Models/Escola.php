<?php

namespace App\Models;

use App\Models\Database;

class Escola extends Database
{
    /**
    * Método estático responsável por buscar escolas.
    *
    * @return array Dados das escolas.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                dazim_escolas 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar uma escola.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da escola.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome, cep, rua, bairro, cidade, numero
            FROM
                dazim_escolas 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por salvar uma escola.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO dazim_escolas (nome, cep, rua, bairro, cidade, numero)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['nome'],
            $data['cep'],
            $data['rua'],
            $data['bairro'],
            $data['cidade'],
            $data['numero'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar uma escola.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados da escola.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                dazim_escolas
            SET
                nome = ?,
                cep = ?,
                rua = ?,
                bairro = ?,
                cidade = ?,
                numero = ?
            WHERE
                id = ?
        ");

        $stmt->execute([
            $data['nome'],
            $data['cep'],
            $data['rua'],
            $data['bairro'],
            $data['cidade'],
            $data['numero'],
            $id
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar uma escola.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados da escola.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                dazim_escolas
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
<?php

namespace App\Models;

use App\Models\Database;

class AlunoTurma extends Database
{
    /**
    * Método estático responsável por buscar alunos e turmas.
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
                dazim_alunos_turmas 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar um aluno e turma.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do aluno e turma.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, aluno_id, turma_id
            FROM
                dazim_alunos_turmas 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por salvar um aluno e turma.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO dazim_alunos_turmas (aluno_id, turma_id)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $data['aluno_id'],
            $data['turma_id']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar um aluno e turma.
    *
    * @param int|string $id Identificador.
    * @param array $data Dados de entrada.
    *
    * @return array Dados do aluno e turma.
    */
    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE
                dazim_alunos_turmas
            SET
                aluno_id = ?,
                turma_id = ?
            WHERE
                id = ?
        ");

        $stmt->execute([
            $data['aluno_id'],
            $data['turma_id'],
            $id
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar um aluno e turma.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do aluno e turma.
    */
    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM
                dazim_alunos_turmas
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
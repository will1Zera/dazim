<?php

namespace App\Models;

use App\Models\Database;

class Aluno extends Database
{
    /**
    * Método estático responsável por buscar alunos.
    *
    * @return array Dados dos alunos.
    */
    public static function index()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                *
            FROM
                imdaz_alunos 
        ");

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
    * Método estático responsável por buscar um aluno.
    *
    * @param int|string $id Identificador.
    *
    * @return array Dados do aluno.
    */
    public static function find(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT
                id, nome, cep, rua, bairro, cidade, numero, cpf, rg, emissao_rg, nascimento, telefone, nis, genero_id, etnia_id, tipo_residencia_id, tipo_parentesco_id, escola_id, nome_responsavel, nome_mae, alfabetizado, deficiencias, mae_trabalha_fora, mae_interesse_projetos, renda_familiar_mensal, quantidade_filhos, possui_irmao_instituicao, recebe_bolsa_familia, direito_imagem, possui_banheiro, possui_agua, possui_luz, nota_fiscal_gaucha
            FROM
                imdaz_alunos 
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
    * Método estático responsável por salvar um aluno.
    *
    * @param object $data Conjunto de dados.
    *
    * @return bool Verdadeiro ou falso.
    */
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO imdaz_alunos (nome, cep, rua, bairro, cidade, numero, cpf, rg, emissao_rg, nascimento, telefone, nis, genero_id, etnia_id, tipo_residencia_id, tipo_parentesco_id, escola_id, nome_responsavel, nome_mae, alfabetizado, deficiencias, mae_trabalha_fora, mae_interesse_projetos, renda_familiar_mensal, quantidade_filhos, possui_irmao_instituicao, recebe_bolsa_familia, direito_imagem, possui_banheiro, possui_agua, possui_luz, nota_fiscal_gaucha)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['nome'],
            $data['cep'],
            $data['rua'],
            $data['bairro'],
            $data['cidade'],
            $data['numero'],
            $data['cpf'],
            $data['rg'],
            $data['emissao_rg'],
            $data['nascimento'],
            $data['telefone'] ?? null,
            $data['nis'] ?? null,

            $data['genero_id'],
            $data['etnia_id'],
            $data['tipo_residencia_id'],
            $data['tipo_parentesco_id'],
            $data['escola_id'],

            $data['nome_responsavel'],
            $data['nome_mae'],
            $data['alfabetizado'],
            $data['deficiencias'] ?? null,
            $data['mae_trabalha_fora'] ?? null,
            $data['mae_interesse_projetos'] ?? null,
            $data['renda_familiar_mensal'] ?? null,
            $data['quantidade_filhos'] ?? null,
            $data['possui_irmao_instituicao'] ?? null,
            $data['recebe_bolsa_familia'] ?? null,
            $data['direito_imagem'] ?? null,
            $data['possui_banheiro'] ?? null,
            $data['possui_agua'] ?? null,
            $data['possui_luz'] ?? null,
            $data['nota_fiscal_gaucha'] ?? null
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    /**
    * Método estático responsável por atualizar um aluno.
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
                imdaz_alunos
            SET
                nome = ?,
                cep = ?,
                rua = ?,
                bairro = ?,
                cidade = ?,
                numero = ?,
                cpf = ?,
                rg = ?,
                emissao_rg = ?,
                nascimento = ?,
                telefone = ?,
                nis = ?,
                genero_id = ?,
                etnia_id = ?,
                tipo_residencia_id = ?,
                tipo_parentesco_id = ?,
                escola_id = ?,
                nome_responsavel = ?,
                nome_mae = ?,
                alfabetizado = ?,
                deficiencias = ?,
                mae_trabalha_fora = ?,
                mae_interesse_projetos = ?,
                renda_familiar_mensal = ?,
                quantidade_filhos = ?,
                possui_irmao_instituicao = ?,
                recebe_bolsa_familia = ?,
                direito_imagem = ?,
                possui_banheiro = ?,
                possui_agua = ?,
                possui_luz = ?,
                nota_fiscal_gaucha = ?
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
            $data['cpf'],
            $data['rg'],
            $data['emissao_rg'],
            $data['nascimento'],
            $data['telefone'] ?? null,
            $data['nis'] ?? null,

            $data['genero_id'],
            $data['etnia_id'],
            $data['tipo_residencia_id'],
            $data['tipo_parentesco_id'],
            $data['escola_id'],

            $data['nome_responsavel'],
            $data['nome_mae'],
            $data['alfabetizado'],
            $data['deficiencias'] ?? null,
            $data['mae_trabalha_fora'] ?? null,
            $data['mae_interesse_projetos'] ?? null,
            $data['renda_familiar_mensal'] ?? null,
            $data['quantidade_filhos'] ?? null,
            $data['possui_irmao_instituicao'] ?? null,
            $data['recebe_bolsa_familia'] ?? null,
            $data['direito_imagem'] ?? null,
            $data['possui_banheiro'] ?? null,
            $data['possui_agua'] ?? null,
            $data['possui_luz'] ?? null,
            $data['nota_fiscal_gaucha'] ?? null,
            $id
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por deletar um aluno.
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
                imdaz_alunos
            WHERE
                id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    /**
    * Método estático responsável por buscar alunos aniversariantes da semana.
    *
    * @return array Dados dos alunos.
    */
    public static function birthday()
    {
        $pdo = self::getConnection();

        $data_atual = date('Y-m-d');
        $data_semana = date('Y-m-d', strtotime('+6 days', strtotime($data_atual)));

        $stmt = $pdo->prepare("
            SELECT
                id, nome, nascimento
            FROM
                imdaz_alunos 
            WHERE
                DATE_FORMAT(nascimento, '%m-%d') BETWEEN DATE_FORMAT(:data_atual, '%m-%d') AND DATE_FORMAT(:data_semana, '%m-%d')
        ");

        $stmt->execute([
            ':data_atual' => $data_atual,
            ':data_semana' => $data_semana
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
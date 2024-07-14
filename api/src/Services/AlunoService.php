<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Aluno;

class AlunoService extends ServiceBase implements ServiceInterface
{
    /**
    * Método estático responsável por buscar alunos.
    *
    * @param mixed $authorization Token.
    *
    * @return array Response.
    */
    public static function index(mixed $authorization)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $alunos = Aluno::index();

            return $alunos;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por buscar um aluno.
    *
    * @param mixed $authorization Token.
    * @param int|string $id Identificador.
    *
    * @return array Response.
    */
    public static function fetch(mixed $authorization, int|string $id)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $aluno = Aluno::find($id);

            if(!$aluno) return ['error' => 'Não foi possível encontrar o aluno.'];

            return $aluno;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por criar um novo aluno.
    *
    * @param mixed $authorization Token.
    * @param object $data Conjunto de dados.
    *
    * @return array Response.
    */
    public static function create(mixed $authorization, array $data)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $fields = Validator::validate([
                'nome' => $data['nome'] ?? '',
                'cep' => $data['cep'] ?? '',
                'rua' => $data['rua'] ?? '',
                'bairro' => $data['bairro'] ?? '',
                'cidade' => $data['cidade'] ?? '',
                'numero' => $data['numero'] ?? '',
                'cpf' => $data['cpf'] ?? '',
                'rg' => $data['rg'] ?? '',
                'emissao_rg' => $data['emissao_rg'] ?? '',
                'nascimento' => $data['nascimento'] ?? '',
                'genero_id' => $data['genero_id'] ?? '',
                'etnia_id' => $data['etnia_id'] ?? '',
                'escola_id' => $data['escola_id'] ?? '',
                'tipo_residencia_id' => $data['tipo_residencia_id'] ?? '',
                'tipo_parentesco_id' => $data['tipo_parentesco_id'] ?? '',
                'nome_responsavel' => $data['nome_responsavel'] ?? '',
                'nome_mae' => $data['nome_mae'] ?? '',
                'alfabetizado' => isset($data['alfabetizado']) ? $data['alfabetizado'] : ''
            ]);

            $fields['nis'] = isset($data['nis']) ?? null;
            $fields['telefone'] = isset($data['telefone']) ?? null;
            $fields['deficiencias'] = isset($data['deficiencias']) ?? null;
            $fields['mae_trabalha_fora'] = isset($data['mae_trabalha_fora']) ?? null;
            $fields['mae_interesse_projetos'] = isset($data['mae_interesse_projetos']) ?? null;
            $fields['renda_familiar_mensal'] = $data['renda_familiar_mensal'] ?? null;
            $fields['quantidade_filhos'] = $data['quantidade_filhos'] ?? null;
            $fields['possui_irmao_instituicao'] = isset($data['possui_irmao_instituicao']) ?? null;
            $fields['recebe_bolsa_familia'] = isset($data['recebe_bolsa_familia']) ?? null;
            $fields['direito_imagem'] = isset($data['direito_imagem']) ?? null;
            $fields['possui_banheiro'] = isset($data['possui_banheiro']) ?? null;
            $fields['possui_agua'] = isset($data['possui_agua']) ?? null;
            $fields['possui_luz'] = isset($data['possui_luz']) ?? null;
            $fields['nota_fiscal_gaucha'] = isset($data['nota_fiscal_gaucha']) ?? null;

            $aluno = Aluno::save($fields);

            if (!$aluno) return ['error' => 'Não foi possível criar o aluno.'];

            return "Aluno criado com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por atualizar um aluno.
    *
    * @param mixed $authorization Token.
    * @param array $data Dados.
    * @param int|string $id Identificador.
    *
    * @return array Response.
    */
    public static function update(mixed $authorization, array $data, int|string $id)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $fields = Validator::validate([
                'nome' => $data['nome'] ?? '',
                'cep' => $data['cep'] ?? '',
                'rua' => $data['rua'] ?? '',
                'bairro' => $data['bairro'] ?? '',
                'cidade' => $data['cidade'] ?? '',
                'numero' => $data['numero'] ?? '',
                'cpf' => $data['cpf'] ?? '',
                'rg' => $data['rg'] ?? '',
                'emissao_rg' => $data['emissao_rg'] ?? '',
                'nascimento' => $data['nascimento'] ?? '',
                'genero_id' => $data['genero_id'] ?? '',
                'etnia_id' => $data['etnia_id'] ?? '',
                'escola_id' => $data['escola_id'] ?? '',
                'tipo_residencia_id' => $data['tipo_residencia_id'] ?? '',
                'tipo_parentesco_id' => $data['tipo_parentesco_id'] ?? '',
                'nome_responsavel' => $data['nome_responsavel'] ?? '',
                'nome_mae' => $data['nome_mae'] ?? '',
                'alfabetizado' => isset($data['alfabetizado']) ? $data['alfabetizado'] : ''
            ]);

            $fields['nis'] = $data['nis'] ?? null;
            $fields['telefone'] = $data['telefone'] ?? null;
            $fields['deficiencias'] = $data['deficiencias'] ?? null;
            $fields['mae_trabalha_fora'] = isset($data['mae_trabalha_fora']) ?? null;
            $fields['mae_interesse_projetos'] = isset($data['mae_interesse_projetos']) ?? null;
            $fields['renda_familiar_mensal'] = $data['renda_familiar_mensal'] ?? null;
            $fields['quantidade_filhos'] = $data['quantidade_filhos'] ?? null;
            $fields['possui_irmao_instituicao'] = isset($data['possui_irmao_instituicao']) ?? null;
            $fields['recebe_bolsa_familia'] = isset($data['recebe_bolsa_familia']) ?? null;
            $fields['direito_imagem'] = isset($data['direito_imagem']) ?? null;
            $fields['possui_banheiro'] = isset($data['possui_banheiro']) ?? null;
            $fields['possui_agua'] = isset($data['possui_agua']) ?? null;
            $fields['possui_luz'] = isset($data['possui_luz']) ?? null;
            $fields['nota_fiscal_gaucha'] = isset($data['nota_fiscal_gaucha']) ?? null;

            $aluno = Aluno::update($id, $fields);

            if(!$aluno) return ['error' => 'Não foi possível atualizar o aluno.'];

            return "Aluno atualizado com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por deletar um aluno.
    *
    * @param mixed $authorization Token.
    * @param int|string $id Identificador.
    *
    * @return array Response.
    */
    public static function delete(mixed $authorization, int|string $id)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $aluno = Aluno::delete($id);

            if(!$aluno) return ['error' => 'Não foi possível remover o aluno.'];

            return "Aluno removido com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por buscar alunos aniversariantes.
    *
    * @param mixed $authorization Token.
    *
    * @return array Response.
    */
    public static function birthday(mixed $authorization)
    {
        try {
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $alunos = Aluno::birthday();

            return $alunos;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\AlunoTurma;

class AlunoTurmaService extends ServiceBase implements ServiceInterface
{
    /**
    * Método estático responsável por buscar alunos e turmas.
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

            $alunos_turmas = AlunoTurma::index();

            return $alunos_turmas;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por buscar um aluno e turma.
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

            $aluno_turma = AlunoTurma::find($id);

            if(!$aluno_turma) return ['error' => 'Não foi possível encontrar o aluno e turma.'];

            return $aluno_turma;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por criar um novo aluno e turma.
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
                'aluno_id' => $data['aluno_id'] ?? '',
                'turma_id' => $data['turma_id'] ?? ''
            ]);

            $aluno_turma = AlunoTurma::save($fields);

            if (!$aluno_turma) return ['error' => 'Não foi possível criar o aluno e turma.'];

            return "Aluno e turma criada com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por atualizar um aluno e turma.
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
                'aluno_id' => $data['aluno_id'] ?? '',
                'turma_id' => $data['turma_id'] ?? ''
            ]);

            $aluno_turma = AlunoTurma::update($id, $fields);

            if(!$aluno_turma) return ['error' => 'Não foi possível atualizar o aluno e turma.'];

            return "Aluno e turma atualizada com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por deletar um aluno e turma.
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

            $aluno_turma = AlunoTurma::delete($id);

            if(!$aluno_turma) return ['error' => 'Não foi possível remover o aluno e turma.'];

            return "Aluno e turma removida com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
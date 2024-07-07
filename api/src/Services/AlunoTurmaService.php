<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\AlunoTurma;

class AlunoTurmaService implements ServiceInterface
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
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login para acessar esse recurso.'];

            $alunos_turmas = AlunoTurma::index();

            if(!$alunos_turmas) return ['error' => 'Não foi possível encontrar os alunos e turmas.'];

            return $alunos_turmas;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
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
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login para acessar esse recurso.'];

            $aluno_turma = AlunoTurma::find($id);

            if(!$aluno_turma) return ['error' => 'Não foi possível encontrar o aluno e turma.'];

            return $aluno_turma;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
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
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login para acessar esse recurso.'];

            $fields = Validator::validate([
                'aluno_id' => $data['aluno_id'] ?? '',
                'turma_id' => $data['turma_id'] ?? ''
            ]);

            $aluno_turma = AlunoTurma::save($fields);

            if (!$aluno_turma) return ['error' => 'Não foi possível criar o aluno e turma.'];

            return "Aluno e turma criada com sucesso!";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
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
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login para acessar esse recurso.'];

            $fields = Validator::validate([
                'aluno_id' => $data['aluno_id'] ?? '',
                'turma_id' => $data['turma_id'] ?? ''
            ]);

            $aluno_turma = AlunoTurma::update($id, $fields);

            if(!$aluno_turma) return ['error' => 'Não foi possível atualizar o aluno e turma.'];

            return "Aluno e turma atualizada com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
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
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];
            
            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login para acessar esse recurso.'];

            $aluno_turma = AlunoTurma::delete($id);

            if(!$aluno_turma) return ['error' => 'Não foi possível remover o aluno e turma.'];

            return "Aluno e turma removida com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Turma;

class TurmaService
{
    /**
    * Método estático responsável por buscar turmas.
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

            $turmas = Turma::index();

            if(!$turmas) return ['error' => 'Não foi possível encontrar as turmas.'];

            return $turmas;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por buscar uma turma.
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

            $turma = Turma::find($id);

            if(!$turma) return ['error' => 'Não foi possível encontrar a turma.'];

            return $turma;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por criar uma nova turma.
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
                'nome' => $data['nome'] ?? '',
                'ano' => $data['ano'] ?? '',
                'turno_id' => $data['turno_id'] ?? ''
            ]);

            $turma = Turma::save($fields);

            if (!$turma) return ['error' => 'Não foi possível criar a turma.'];

            return "Turma criada com sucesso!";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por atualizar uma turma.
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
                'nome' => $data['nome'] ?? '',
                'ano' => $data['ano'] ?? '',
                'turno_id' => $data['turno_id'] ?? ''
            ]);

            $turma = Turma::update($id, $fields);

            if(!$turma) return ['error' => 'Não foi possível atualizar a turma.'];

            return "Turma atualizada com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por deletar uma turma.
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

            $turma = Turma::delete($id);

            if(!$turma) return ['error' => 'Não foi possível remover a turma.'];

            return "Turma removida com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
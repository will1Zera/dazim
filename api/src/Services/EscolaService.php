<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Escola;

class EscolaService implements ServiceInterface
{
    /**
    * Método estático responsável por buscar escolas.
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

            $escolas = Escola::index();

            if(!$escolas) return ['error' => 'Não foi possível encontrar as escolas.'];

            return $escolas;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por buscar uma escola.
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

            $escola = Escola::find($id);

            if(!$escola) return ['error' => 'Não foi possível encontrar a escola.'];

            return $escola;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por criar uma nova escola.
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
                'cep' => $data['cep'] ?? '',
                'rua' => $data['rua'] ?? '',
                'bairro' => $data['bairro'] ?? '',
                'cidade' => $data['cidade'] ?? '',
                'numero' => $data['numero'] ?? ''
            ]);

            $escola = Escola::save($fields);

            if (!$escola) return ['error' => 'Não foi possível criar a escola.'];

            return "Escola criada com sucesso!";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por atualizar uma escola.
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
                'cep' => $data['cep'] ?? '',
                'rua' => $data['rua'] ?? '',
                'bairro' => $data['bairro'] ?? '',
                'cidade' => $data['cidade'] ?? '',
                'numero' => $data['numero'] ?? ''
            ]);

            $escola = Escola::update($id, $fields);

            if(!$escola) return ['error' => 'Não foi possível atualizar a escola.'];

            return "Escola atualizada com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por deletar uma escola.
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

            $escola = Escola::delete($id);

            if(!$escola) return ['error' => 'Não foi possível remover a escola.'];

            return "Escola removida com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
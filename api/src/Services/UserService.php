<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\User;

class UserService
{
    /**
    * Método estático responsável por criar um novo usuário.
    *
    * @param object $data Conjunto de dados.
    *
    * @return array Response.
    */
    public static function create(array $data)
    {
        try {
            $fields = Validator::validate([
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? '',
            ]);

            $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);

            $user = User::save($fields);

            if (!$user) return ['error' => 'Não foi possível criar a conta.'];

            return "Usuário criado com sucesso!";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            if ($e->errorInfo[0] === '23000') return ['error' => 'Não foi possível criar a conta, e-mail já está em uso.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por autenticar um usuário.
    *
    * @param object $data Conjunto de dados.
    *
    * @return array Response.
    */
    public static function auth(array $data)
    {
        try {
            $fields = Validator::validate([
                'email' => $data['email'] ?? '',
                'password' => $data['password'] ?? '',
            ]);

            $user = User::authentication($fields);

            if (!$user) return ['error' => 'Não foi possível realizar o login.'];
            
            return JWT::generate($user);
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por buscar um usuário.
    *
    * @param mixed $authorization Token.
    *
    * @return array Response.
    */
    public static function fetch(mixed $authorization)
    {
        try {
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login apra acessar esse recurso.'];

            $user = User::find($userFromJWT['id']);

            if(!$user) return ['error' => 'Não foi possível encontrar o usuário.'];

            return $user;
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por atualizar um usuário.
    *
    * @param mixed $authorization Token.
    * @param array $data Dados.
    *
    * @return array Response.
    */
    public static function update(mixed $authorization, array $data)
    {
        try {
            if (isset($authorization['error'])) return ['unauthorized' => $authorization['error']];

            $userFromJWT = JWT::verify($authorization);

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login apra acessar esse recurso.'];

            $fields = Validator::validate([
                'name' => $data['name'] ?? ''
            ]);

            $user = User::update($userFromJWT['id'], $fields);

            if(!$user) return ['error' => 'Não foi possível atualizar o usuário.'];

            return "Usuário atualizado com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
    * Método estático responsável por atualizar um usuário.
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

            if(!$userFromJWT) return ['unauthorized' => 'Realize o login apra acessar esse recurso.'];

            $user = User::delete($id);

            if(!$user) return ['error' => 'Não foi possível remover o usuário.'];

            return "Usuário removido com sucesso.";
        } catch (PDOException $e) {
            if ($e->errorInfo[0] === 'HY000') return ['error' => 'Não foi possível conectar ao banco de dados.'];
            if ($e->errorInfo[0] === 'HY093') return ['error' => 'Não foi possível encontrar a tabela.'];
            return ['error' => $e->getMessage()];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\TipoParentesco;

class TipoParentescoService extends ServiceBase implements ServiceInterface
{
    /**
    * Método estático responsável por buscar tipos de parentesco.
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

            $parentescos = TipoParentesco::index();

            return $parentescos;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por buscar um tipo de parentesco.
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

            $parentesco = TipoParentesco::find($id);

            if(!$parentesco) return ['error' => 'Não foi possível encontrar o tipo de parentesco.'];

            return $parentesco;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por criar um novo tipo de parentesco.
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
            ]);

            $parentesco = TipoParentesco::save($fields);

            if (!$parentesco) return ['error' => 'Não foi possível criar o tipo de parentesco.'];

            return "Tipo de parentesco criado com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por atualizar um tipo de parentesco.
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
                'nome' => $data['nome'] ?? ''
            ]);

            $parentesco = TipoParentesco::update($id, $fields);

            if(!$parentesco) return ['error' => 'Não foi possível atualizar o tipo de parentesco.'];

            return "Tipo de parentesco atualizado com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por deletar um tipo de parentesco.
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

            $parentesco = TipoParentesco::delete($id);

            if(!$parentesco) return ['error' => 'Não foi possível remover o tipo de parentesco.'];

            return "Tipo de parentesco removido com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
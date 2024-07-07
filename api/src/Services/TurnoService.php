<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Turno;

class TurnoService extends ServiceBase implements ServiceInterface
{
    /**
    * Método estático responsável por buscar turnos.
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

            $turnos = Turno::index();

            return $turnos;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por buscar um turno.
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

            $turnos = Turno::find($id);

            if(!$turnos) return ['error' => 'Não foi possível encontrar o turno.'];

            return $turnos;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por criar um novo turno.
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

            $turno = Turno::save($fields);

            if (!$turno) return ['error' => 'Não foi possível criar o turno.'];

            return "Turno criado com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por atualizar um turno.
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

            $turno = Turno::update($id, $fields);

            if(!$turno) return ['error' => 'Não foi possível atualizar o turno.'];

            return "Turno atualizado com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }

    /**
    * Método estático responsável por deletar um turno.
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

            $turno = Turno::delete($id);

            if(!$turno) return ['error' => 'Não foi possível remover o turno.'];

            return "Turno removido com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
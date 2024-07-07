<?php

namespace App\Services;

use App\Http\JWT;
use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Turma;

class TurmaService extends ServiceBase implements ServiceInterface
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $turmas = Turma::index();

            return $turmas;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $turma = Turma::find($id);

            if(!$turma) return ['error' => 'Não foi possível encontrar a turma.'];

            return $turma;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $fields = Validator::validate([
                'nome' => $data['nome'] ?? '',
                'ano' => $data['ano'] ?? '',
                'turno_id' => $data['turno_id'] ?? ''
            ]);

            $turma = Turma::save($fields);

            if (!$turma) return ['error' => 'Não foi possível criar a turma.'];

            return "Turma criada com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $fields = Validator::validate([
                'nome' => $data['nome'] ?? '',
                'ano' => $data['ano'] ?? '',
                'turno_id' => $data['turno_id'] ?? ''
            ]);

            $turma = Turma::update($id, $fields);

            if(!$turma) return ['error' => 'Não foi possível atualizar a turma.'];

            return "Turma atualizada com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $turma = Turma::delete($id);

            if(!$turma) return ['error' => 'Não foi possível remover a turma.'];

            return "Turma removida com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
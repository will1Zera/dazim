<?php

namespace App\Services;

use App\Utils\Validator;
use Exception;
use PDOException;
use App\Models\Escola;

class EscolaService extends ServiceBase implements ServiceInterface
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $escolas = Escola::index();

            return $escolas;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $escola = Escola::find($id);

            if(!$escola) return ['error' => 'Não foi possível encontrar a escola.'];

            return $escola;
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
                'numero' => $data['numero'] ?? ''
            ]);

            $escola = Escola::save($fields);

            if (!$escola) return ['error' => 'Não foi possível criar a escola.'];

            return "Escola criada com sucesso!";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
                'numero' => $data['numero'] ?? ''
            ]);

            $escola = Escola::update($id, $fields);

            if(!$escola) return ['error' => 'Não foi possível atualizar a escola.'];

            return "Escola atualizada com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
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
            $check = self::checkAuthorization($authorization);
            if (isset($check['unauthorized'])) {
                return $check;
            }

            $escola = Escola::delete($id);

            if(!$escola) return ['error' => 'Não foi possível remover a escola.'];

            return "Escola removida com sucesso.";
        } catch (PDOException $e) {
            return self::handlePDOException($e);
        } catch (Exception $e) {
            return self::handleException($e);
        }
    }
}
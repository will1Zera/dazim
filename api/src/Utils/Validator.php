<?php

namespace App\Utils;

class Validator
{
    /**
    * Método estático responsável por validar e filtrar os campos.
    *
    * @param array $fields Conjunto de campos.
    *
    * @return array Campos validados.
    */
    public static function validate(array $fields)
    {
        foreach ($fields as $field => $value) {
            if (!isset($value) || trim((string)$value) === '') {
                throw new \Exception("O campo $field é obrigatório.");
            }
        }
        return $fields;
    }
}
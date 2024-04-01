<?php

namespace App\Models;

use PDO;

class Database
{
    /**
    * Método estático responsável por criar a conexão com o banco de dados.
    *
    * @return object Conexão.
    */
    public static function getConnection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=imdaz', 'root', '');

        return $pdo;
    }
}
<?php

namespace App\Migrations;

use App\Models\Database;

class CreateImdazGenerosTable extends Database
{
    /**
    * Método estático resposável por rodar a migração da tabela.
    *
    * @return void
    */
    public static function up()
    {
        $pdo = self::getConnection();

        $sql = "
            CREATE TABLE IF NOT EXISTS imdaz_generos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_generos' criada com sucesso\n";
    }

    /**
    * Método estático resposável por reverter a migração da tabela.
    *
    * @return void
    */
    public static function down()
    {
        $pdo = self::getConnection();

        $sql = "DROP TABLE IF EXISTS imdaz_generos";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_generos' removida com sucesso\n";
    }
}

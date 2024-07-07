<?php

namespace App\Migrations;

use App\Models\Database;

class CreateDazimEscolasTable extends Database
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
            CREATE TABLE IF NOT EXISTS dazim_escolas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                cep VARCHAR(9) NOT NULL,
                rua VARCHAR(255) NOT NULL,
                bairro VARCHAR(255) NOT NULL,
                cidade VARCHAR(255) NOT NULL,
                numero VARCHAR(10) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ";

        $pdo->exec($sql);

        echo "Tabela 'dazim_escolas' criada com sucesso\n";
    }

    /**
    * Método estático resposável por reverter a migração da tabela.
    *
    * @return void
    */
    public static function down()
    {
        $pdo = self::getConnection();

        $sql = "DROP TABLE IF EXISTS dazim_escolas";

        $pdo->exec($sql);

        echo "Tabela 'dazim_escolas' removida com sucesso\n";
    }
}

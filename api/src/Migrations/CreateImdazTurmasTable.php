<?php

namespace App\Migrations;

use App\Models\Database;

class CreateImdazTurmasTable extends Database
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
            CREATE TABLE IF NOT EXISTS imdaz_turmas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                ano INT NOT NULL,
                turno_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (turno_id) REFERENCES imdaz_turnos(id) ON DELETE CASCADE
            )
        ";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_turmas' criada com sucesso\n";
    }

    /**
    * Método estático resposável por reverter a migração da tabela.
    *
    * @return void
    */
    public static function down()
    {
        $pdo = self::getConnection();

        $sql = "DROP TABLE IF EXISTS imdaz_turmas";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_turmas' removida com sucesso\n";
    }
}

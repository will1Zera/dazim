<?php

namespace App\Migrations;

use App\Models\Database;

class CreateDazimTurmasTable extends Database
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
            CREATE TABLE IF NOT EXISTS dazim_turmas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                ano INT NOT NULL,
                turno_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (turno_id) REFERENCES dazim_turnos(id) ON DELETE CASCADE
            )
        ";

        $pdo->exec($sql);

        echo "Tabela 'dazim_turmas' criada com sucesso\n";
    }

    /**
    * Método estático resposável por reverter a migração da tabela.
    *
    * @return void
    */
    public static function down()
    {
        $pdo = self::getConnection();

        $sql = "DROP TABLE IF EXISTS dazim_turmas";

        $pdo->exec($sql);

        echo "Tabela 'dazim_turmas' removida com sucesso\n";
    }
}

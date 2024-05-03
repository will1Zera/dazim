<?php

namespace App\Migrations;

use App\Models\Database;

class CreateImdazAlunosTable extends Database
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
            CREATE TABLE IF NOT EXISTS imdaz_alunos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                cep VARCHAR(9) NOT NULL,
                rua VARCHAR(255) NOT NULL,
                bairro VARCHAR(255) NOT NULL,
                cidade VARCHAR(255) NOT NULL,
                numero VARCHAR(10) NOT NULL,
                cpf VARCHAR(14) UNIQUE NOT NULL,
                rg VARCHAR(30) UNIQUE NOT NULL,
                emissao_rg DATE NOT NULL,
                nis VARCHAR(30) NULL,
                telefone VARCHAR(30) NULL,
                nascimento DATE NOT NULL,

                genero_id INT NOT NULL,
                etnia_id INT NOT NULL,
                escola_id INT NOT NULL,
                tipo_residencia_id INT NOT NULL,
                tipo_parentesco_id INT NOT NULL,

                nome_responsavel VARCHAR(255) NOT NULL,
                nome_mae VARCHAR(255) NOT NULL,
                alfabetizado BOOLEAN NOT NULL,
                deficiencias VARCHAR(255) NULL,
                mae_trabalha_fora BOOLEAN NULL,
                mae_interesse_projetos BOOLEAN NULL,
                renda_familiar_mensal DECIMAL NULL,
                quantidade_filhos INT NULL,
                possui_irmao_instituicao BOOLEAN NULL,
                recebe_bolsa_familia BOOLEAN NULL,
                direito_imagem BOOLEAN NULL,
                possui_banheiro BOOLEAN NULL,
                possui_agua BOOLEAN NULL,
                possui_luz BOOLEAN NULL,
                nota_fiscal_gaucha BOOLEAN NULL,

                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (genero_id) REFERENCES imdaz_generos(id) ON DELETE CASCADE,
                FOREIGN KEY (etnia_id) REFERENCES imdaz_etnias(id) ON DELETE CASCADE,
                FOREIGN KEY (escola_id) REFERENCES imdaz_escolas(id) ON DELETE CASCADE,
                FOREIGN KEY (tipo_residencia_id) REFERENCES imdaz_tipo_residencias(id) ON DELETE CASCADE,
                FOREIGN KEY (tipo_parentesco_id) REFERENCES imdaz_tipo_parentescos(id) ON DELETE CASCADE
            )
        ";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_alunos' criada com sucesso\n";
    }

    /**
    * Método estático resposável por reverter a migração da tabela.
    *
    * @return void
    */
    public static function down()
    {
        $pdo = self::getConnection();

        $sql = "DROP TABLE IF EXISTS imdaz_alunos";

        $pdo->exec($sql);

        echo "Tabela 'imdaz_alunos' removida com sucesso\n";
    }
}

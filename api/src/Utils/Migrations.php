<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\Migrations\CreateUsersTable;

use App\Migrations\CreateDazimGenerosTable;
use App\Migrations\CreateDazimEtniasTable;
use App\Migrations\CreateDazimTurnosTable;
use App\Migrations\CreateDazimTipoResidenciasTable;
use App\Migrations\CreateDazimTipoParentescosTable;
use App\Migrations\CreateDazimEscolasTable;

use App\Migrations\CreateDazimTurmasTable;
use App\Migrations\CreateDazimAlunosTable;
use App\Migrations\CreateDazimAlunosTurmasTable;


// Executa todas as migrations

CreateUsersTable::up();

CreateDazimGenerosTable::up();
CreateDazimEtniasTable::up();
CreateDazimTurnosTable::up();
CreateDazimTipoResidenciasTable::up();
CreateDazimTipoParentescosTable::up();
CreateDazimEscolasTable::up();

CreateDazimTurmasTable::up();
CreateDazimAlunosTable::up();
CreateDazimAlunosTurmasTable::up();


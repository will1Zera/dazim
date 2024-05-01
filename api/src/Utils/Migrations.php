<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\Migrations\CreateUsersTable;
use App\Migrations\CreateImdazGenerosTable;
use App\Migrations\CreateImdazEtniasTable;
use App\Migrations\CreateImdazTurnosTable;
use App\Migrations\CreateImdazTipoResidenciasTable;
use App\Migrations\CreateImdazTipoParentescosTable;
use App\Migrations\CreateImdazEscolasTable;

// Executa todas as migrations

CreateUsersTable::up();

CreateImdazGenerosTable::up();
CreateImdazEtniasTable::up();
CreateImdazTurnosTable::up();
CreateImdazTipoResidenciasTable::up();
CreateImdazTipoParentescosTable::up();
CreateImdazEscolasTable::up();

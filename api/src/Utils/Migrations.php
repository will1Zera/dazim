<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\Migrations\CreateUsersTable;
use App\Migrations\CreateImdazGenerosTable;
use App\Migrations\CreateImdazEtniasTable;

// Executa todas as migrations

CreateUsersTable::up();
CreateImdazGenerosTable::up();
CreateImdazEtniasTable::up();

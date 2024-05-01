<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\Migrations\CreateUsersTable;
use App\Migrations\CreateImdazGenerosTable;

// Executa todas as migrations

CreateUsersTable::up();
CreateImdazGenerosTable::up();

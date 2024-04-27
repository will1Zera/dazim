<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use App\Migrations\CreateUsersTable;

// Executa todas as migrations

CreateUsersTable::up();

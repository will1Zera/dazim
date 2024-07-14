<?php

include 'src/controllers/AuthController.php';
include 'src/controllers/HomeController.php';
include 'src/controllers/EtniaController.php';
include 'src/controllers/EscolaController.php';
include 'src/controllers/TurnoController.php';
include 'src/controllers/TurmaController.php';
include 'src/controllers/GeneroController.php';
include 'src/controllers/ParentescoController.php';
include 'src/controllers/ResidenciaController.php';

// Captura a url
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Redireciona para a rota da url
switch($url){
    case '/dazim/app/':
        AuthController::index();
    break;

    case '/dazim/app/home':
        HomeController::index();
    break;

    case '/dazim/app/etnias':
        EtniaController::index();
    break;

    case '/dazim/app/turnos':
        TurnoController::index();
    break;

    case '/dazim/app/generos':
        GeneroController::index();
    break;

    case '/dazim/app/parentescos':
        ParentescoController::index();
    break;

    case '/dazim/app/residencias':
        ResidenciaController::index();
    break;

    case '/dazim/app/escolas':
        EscolaController::index();
    break;

    case '/dazim/app/turmas':
        TurmaController::index();
    break;
    
    /*
    default:
        SystemController::error();
    */
}
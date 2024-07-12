<?php

include 'src/controllers/AuthController.php';
include 'src/controllers/HomeController.php';

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
    
    /*
    default:
        SystemController::error();
    */
}
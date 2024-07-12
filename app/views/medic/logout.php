<?php 
    /*
    */
    require_once("configuration/connect.php");
    require_once("configuration/globals.php"); 
    require_once("models/Medic.php");
    require_once("models/Person.php");
    require_once("models/Message.php");
    require_once("dao/MedicDAO.php");
    require_once("dao/PersonDAO.php");

    $medicDAO = new medicDAO($conn, $BASE_URL);
    // Verifica se o médico está logado
    if($medicDAO){
        // Desloga o médico
        $medicDAO->destroyToken();
    }
?>
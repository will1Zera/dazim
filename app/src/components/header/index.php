<?php 
    require_once("src/config/globals.php"); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>
    <!-- Toastify -->
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"  rel="stylesheet" type="text/css">
    <!-- CSS -->
    <link href="<?= $URL ?>src/components/header/styles.css" rel="stylesheet"/>

    <title>Dazim</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?= $CSRF ?>">
</head>
<body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Toastify JS -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js" type="text/javascript" ></script>
<!-- Mask JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- Sweetalert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Cookie JS -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>



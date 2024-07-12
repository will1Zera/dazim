<?php 
    require_once("configuration/connect.php");
    require_once("configuration/globals.php"); 
    require_once("models/Message.php");
    require_once("dao/MedicDAO.php");
    
    $message = new Message($BASE_URL);

    $flassMessage = $message->getMessage(); // Pega a mensagem
    // Limpa a mensagem
    if(!empty($flassMessage["msg"])){
        $message->clearMessage();
    }

    $medicDAO = new medicDAO($conn, $BASE_URL);
    $personDAO = new personDAO($conn, $BASE_URL);
    $medicData = $medicDAO->verifyToken(false);
    //$personData = $personDAO->findById($medicData->id_person);
    if ($medicData) {
        $personData = $personDAO->findById($medicData->id_person);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.css" integrity="sha512-azoUtNAvw/SpLTPr7Z7M+5BPWGOxXOqn3/pMnCxyDqOiQd4wLVEp0+AqV8HcoUaH02Lt+9/vyDxwxHojJOsYNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icons font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/index.css" />
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/register_login.css" />
    <link rel="stylesheet" href="<?= $BASE_URL ?>views/css/header.css" />

    <title>Gesta +</title>
</head>
<body>
    <header id="header">
        <div class="header__container">
            <div>
                <a href="<?= $BASE_URL ?>"><h3 class="header__title" >Gesta +</h3></a>
            </div>
            <div class="header__container-nav">
                <nav id="nav">
                    <ul class="header__ul" id="nav__li">
                        <div class="header__button-close" id="btn_close"><i class="fa-solid fa-xmark"></i></div>
                         <!-- Lógica que muda os links do header caso esteja logado ou não -->
                        <?php if($medicData): ?>
                            <li><a class="header__li" href="#"><i class="fa-solid fa-magnifying-glass"></i> Pesquisa Paciente</a></li>
                            <li><a class="header__li" href="#"><i class="fa-solid fa-plus"></i> Novo Paciente</a></li>
                            <li><a class="header__li" href="medic-profile"><i class="fa-regular fa-user"></i> <?= $personData->name ?></a></li>
                            <li><a class="header__li" href="medic-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
                        <?php else: ?>
                            <li><a class="header__li-login" href="login"><i class="fa-solid fa-user-large"></i> Entrar</a></li>
                            <li><a class="header__li-register" href="register"><i class="fa-solid fa-arrow-up-right-from-square"></i> Criar conta</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="header__button-menu" id="btn_menu"><i class="fas fa-bars"></i></div>
            </div>
        </div>
    </header>
    <!-- Lógica que imprime mensagem de sucesso ou erro -->
    <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
            <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?><i class="fa-solid fa-x" onclick="fecharMensagem(this)"></i></p>
        </div>
        <script>
            // Função que esconde a mensagem após 4s
            setTimeout(function() {
                var msgContainer = document.querySelector('.msg-container');
                if (msgContainer) {
                    msgContainer.style.animation = 'slideOut 0.5s ease forwards';
                    setTimeout(function() {
                        msgContainer.style.display = 'none';
                    }, 500);
                }
            }, 4000);
        </script>
    <?php endif; ?>
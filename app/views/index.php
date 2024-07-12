<?php 
    // Barra o acesso de médicos não logados
    $medicDAO = new medicDAO($conn, $BASE_URL);
    $medicData = $medicDAO->verifyToken(true);

?>    
    <div class="main__container">

        <h2 class="main__title">Home</h2>

    </div>
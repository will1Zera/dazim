<?php 
    require_once("dao/PasswordDAO.php");
    
    $passwordDAO = new passwordDAO($conn, $BASE_URL);

    $rash = filter_input(INPUT_GET, "rash");

    if(empty($rash)){ 
        $message->setMessage("Sem permissão de acesso.", "error", "login");
    } else{
        $recover = $passwordDAO->findByRash($rash);
        if(($recover === false)){
            $message->setMessage("Sem permissão de acesso.", "error", "login");
        }
    }
?>

    <div id="main-container" class="container-fluid">
        <div class="col-md-12">    
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2>Alterar senha</h2>
                    <p>Digite a sua nova senha e confirme para alterar.</p>
                    <form action="medic-forgot-process" method="POST">
                        <input type="hidden" name="type" value="password-recover">
                        <input type="hidden" name="recover_data" value="<?php echo htmlspecialchars(json_encode($recover)); ?>">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua nova senha">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirme a senha</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme a sua nova senha">
                        </div>
                        <input type="submit" class="btn card-btn" value="Alterar senha">
                    </form>
                </div>
            </div>
        </div>
    </div>
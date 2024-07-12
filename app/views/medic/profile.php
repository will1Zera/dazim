<?php 
    // Barra o acesso de médicos não logados
    $medicDAO = new medicDAO($conn, $BASE_URL);
    $personDAO = new personDAO($conn, $BASE_URL);
    $medicData = $medicDAO->verifyToken(true);
    $personData = $personDAO->findById($medicData->id_person);
?>

    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2>Olá, <?= $personData->name ?></h2>
                    <p>Altere seus dados no formulário abaixo:</p>
                    <form action="medic-profile-process" method="POST">
                        <input type="hidden" name="type" value="update">
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" maxlength="150" class="form-control" id="name" placeholder="Digite seu nome" name="name" value="<?= $personData->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" readonly oninput="cpfMask(this)" maxlength="14" class="form-control disabled" id="cpf" placeholder="Digite seu CPF" name="cpf" value="<?= $personData->cpf ?>">
                        </div>
                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input type="text" maxlength="6" class="form-control" id="crm" placeholder="Digite seu CRM" name="crm" value="<?= $medicData->crm ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" oninput="phoneMask(this)" maxlength="14" class="form-control" id="phone" placeholder="Digite seu DDD + telefone" name="phone" value="<?= $medicData->phone ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" maxlength="150" class="form-control" id="email" placeholder="Digite seu e-mail" name="email" value="<?= $medicData->email ?>">
                        </div>
                        <input type="submit" class="btn card-btn" value="Alterar dados">
                    </form>
                </div>
            </div>
            
            <div class="row" id="profile-row">
                <div class="col-md-6" id="register__container">
                    <h2 class="profile__title">Alterar senha</h2>
                    <p>Digite a sua nova senha e confirme para alterar:</p>
                    <form action="medic-profile-process" method="POST">
                        <input type="hidden" name="type" value="update-password">
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
    <script src="../../../extensao-ucpel/views/js/script.js"></script>
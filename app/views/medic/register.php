    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2>Cadastro Médico</h2>
                    <form action="medic-process" method="POST">
                        <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" maxlength="150" class="form-control" id="name" placeholder="Digite seu nome" name="name">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" oninput="cpfMask(this)" maxlength="14" class="form-control" id="cpf" placeholder="Digite seu CPF" name="cpf" >
                        </div>
                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input type="text" maxlength="6" class="form-control" id="crm" placeholder="Digite seu CRM" name="crm" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" oninput="phoneMask(this)" maxlength="14" class="form-control" id="phone" placeholder="Digite seu DDD + telefone" name="phone" >
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" maxlength="150" class="form-control" id="email" placeholder="Digite seu e-mail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" maxlength="30" class="form-control" id="password" placeholder="Digite sua senha" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirmar senha</label>
                            <input type="password" maxlength="30" class="form-control" id="confirmpassword" placeholder="Confirme sua senha" name="confirmpassword">
                        </div>
                        <input type="submit" class="btn card-btn" value="Cadastrar">
                        <p class="form__text">Já possui uma conta? <a class="form__link-register" href="login">Acesse aqui.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../extensao-ucpel/views/js/script.js"></script>
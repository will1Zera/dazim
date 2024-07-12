    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2>Gesta +</h2>
                    <form action="medic-process" method="POST">
                        <input type="hidden" name="type" value="login">
                        <div class="form-group" id="form-group">
                            <label for="cpf">CPF</label>
                            <i class="fa-regular fa-id-card"></i><input type="text" oninput="cpfMask(this)" maxlength="14" class="form-control" id="cpf" placeholder="Digite seu CPF" name="cpf">
                        </div>
                        <div class="form-group" id="form-group">
                            <label for="password">Senha</label>
                            <i class="fa-solid fa-lock"></i><input type="password" maxlength="30" class="form-control" id="password" placeholder="Digite sua senha" name="password">
                        </div>
                        <a class="form__link-password" href="forgot">Esqueceu a senha?</a>
                        <input type="submit" class="btn card-btn" value="Login">
                        <p class="form__text">Não tem uma conta? <a class="form__link-register" href="register">Cadastre-se.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../extensao-ucpel/views/js/script.js"></script>
    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-6" id="register__container">
                    <h2>Recuperar senha</h2>
                    <form action="medic-forgot-process" method="POST">
                        <input type="hidden" name="type" value="forgot">
                        <p>Enviaremos um link para seu e-mail com duração de <strong>15 minutos</strong> para alterar sua senha.</p>
                        <div class="form-group" id="form-group">
                            <i class="fa-regular fa-envelope"></i></i><input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email">
                        </div>
                        <input type="submit" class="btn card-btn" value="Enviar">
                        <p class="form__text">Lembrou da senha? <a class="form__link-register" href="login">Acesse aqui.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
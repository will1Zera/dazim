<style>
.login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
}

.form {
    position: relative;
    z-index: 1;
    background-color: var(--blue-light-color);
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    border-radius: var(--default-border-radius);
}

.form input {
    outline: 0;
    width: 100%;
    border: 0;
    margin: 0 0 20px;
    padding: 10px;
    border-radius: var(--default-border-radius);
    font-size: var(--tiny-size);
}

.form button {
    text-transform: uppercase;
    outline: 0;
    background-color: var(--blue-color);
    width: 100%;
    border: 0;
    padding: 15px;
    color: var(--white-color);
    font-size: 14px;
    transition: .5s;
    cursor: pointer;
    border-radius: var(--default-border-radius);
}

.form button:hover,.form button:active,.form button:focus {
    background-color: var(--blue-dark-color);
}

.form .message {
    margin: 15px 0 0;
    color: var(--black-color);
    font-size: var(--tiny-size);
}

.form .message a {
    color: var(--blue-color);
    text-decoration: none;
}

.form .register-form {
    display: none;
}
</style>

<div class="login-page">
    <div class="form">
        <h1 style="margin-bottom: 30px;">Dazim</h1>
        <form class="register-form">
            <input type="text" id="register-name" name="name" placeholder="Nome completo" required/>
            <input type="text" id="register-email" name="email" placeholder="E-mail" required/>
            <input type="password" id="register-password" name="password" placeholder="Senha" required/>
            <button type="submit">Criar</button>
            <p class="message">Já possui uma conta? <a href="#">Acesse aqui.</a></p>
        </form>
        <form class="login-form">
            <input type="text" id="login-email" name="email" placeholder="E-mail" required/>
            <input type="password" id="login-password" name="password" placeholder="Senha" required/>
            <button type="submit">Acessar</button>
            <p class="message">Não possui uma conta? <a href="#">Crie aqui.</a></p>
        </form>
    </div>
</div>

<script>
    $('.message a').click(function () {
        $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });

    $('.register-form').on('submit', function (e) {
        e.preventDefault();

        let form = new FormData(this);

        PostFetch(form, '<?= $API_URL ?>users/create');
    });

    $('.login-form').on('submit', function (e) {
        e.preventDefault();

        let form = new FormData(this);
        
        PostFetch(form, '<?= $API_URL ?>users/login', '<?= $URL ?>home');
    });
</script>
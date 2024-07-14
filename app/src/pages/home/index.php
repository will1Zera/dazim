<h2 class="title" id="nome-usuario">
    <script id="nome-usuario-template" type="text/x-template">
        <li>Olá, {{nome_usuario}} 👋</li>
    </script>
</h2>

<div class="info-data">
    <div class="card">
        <div class="head">
            <div>
                <h2 id="quantidade-alunos">0</h2>
                <p>Alunos <i class="fa fa-graduation-cap icon" style="margin-left: 5px;"></i></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="head">
            <div>
                <h2 id="quantidade-turmas">0</h2>
                <p>Turmas <i class="fa fa-folder-open icon" style="margin-left: 5px;"></i></p>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 15px;">
    <h2 class="title">Aniversariantes da semana 🎉</h2>
    <div>
        <ul id="lista">
            <script id="lista-template" type="text/x-template">
                <li>{{nascimento}} - {{nome}}</li>
            </script>
        </ul>
    </div>
</div>

<script>
    $(document).ready(async function() {
        indexPage();
        indexUser();
        indexCount();
    });

    async function indexPage(){
        const data = await getFetch('<?= $API_URL ?>alunos/birthday');
        const lista_body = $('#lista');
        const lista_template = $('#lista-template').html();
        lista_body.empty();

        if (data.length > 0) {
            data.forEach(item => {
                const [year, month, day] = item.nascimento.split('-');
                const nascimento_data = `${day}/${month}`;
                const row = lista_template
                    .replace('{{nascimento}}', nascimento_data)
                    .replace('{{nome}}', item.nome);

                lista_body.append(row);
            });
        } else {
            const row = '<li>Nenhum aniversariante encontrado.</li>';
            lista_body.append(row);
        }
    }

    async function indexUser(){
        const data = await getFetch('<?= $API_URL ?>users/fetch');
        const body = $('#nome-usuario');
        const template = $('#nome-usuario-template').html();
        body.empty();

        const row = template.replace('{{nome_usuario}}', data.name);

        body.append(row);
    }

    async function indexCount(){
        const data_alunos = await getFetch('<?= $API_URL ?>alunos');
        const data_turmas = await getFetch('<?= $API_URL ?>turmas');
        
        $('#quantidade-alunos').text(data_alunos.length);
        $('#quantidade-turmas').text(data_turmas.length);
    }
</script>
<div style="display: flex; justify-content: space-between;">
    <h2 class="title">Alunos</h2>
    <button type="button" class="primary-button" data-toggle="modal" data-target="#addAlunoModal">
        <i class="fa fa-plus" style="color: white;"></i>
    </button>
</div>

<!-- Tabela de Alunos -->
<div class="table-responsive" style="margin-top: 15px;">
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table-alunos">
            <script id="table-template" type="text/x-template">
                <tr>
                    <td>{{nome}}</td>
                    <td>{{cpf}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-button" 
                            data-toggle="modal" 
                            data-target="#editAlunoModal"
                            data-id="{{id}}" 
                            data-nome="{{nome}}" 
                            data-cpf="{{cpf}}"
                            data-cep="{{cep}}" 
                            data-rua="{{rua}}" 
                            data-numero="{{numero}}" 
                            data-cidade="{{cidade}}" 
                            data-bairro="{{bairro}}"
                            data-telefone="{{telefone}}"
                            data-rg="{{rg}}"
                            data-emissao_rg="{{emissao_rg}}"
                            data-nascimento="{{nascimento}}"
                            data-genero_id="{{genero_id}}"
                            data-etnia_id="{{etnia_id}}"
                            data-escola_id="{{escola_id}}"
                            data-tipo_residencia_id="{{tipo_residencia_id}}"
                            data-tipo_parentesco_id="{{tipo_parentesco_id}}"
                            data-nome_responsavel="{{nome_responsavel}}"
                            data-nome_mae="{{nome_mae}}"
                            data-alfabetizado="{{alfabetizado}}"
                        >
                            <i class="fa fa-pencil" style="color: white;"></i>
                        </button>
                    </td>
                    <td>
                        <form class="delete-form" data-id="{{id}}">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" style="color: white;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </script>
        </tbody>
    </table>
</div>

<!-- Modal de adicionar aluno -->
<div class="modal fade" id="addAlunoModal" tabindex="-1" role="dialog" aria-labelledby="addAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlunoModalLabel">Adicionar aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAlunoForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome*</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF*</label>
                        <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="Digite o cpf" required>
                    </div>
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP*</label>
                        <input type="text" class="form-control cep" id="cep" name="cep" placeholder="Digite o cep" required>
                    </div>
                    <div class="mb-3">
                        <label for="rua" class="form-label">Rua*</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite a rua" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número*</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o número" required>
                    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" required>
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade*</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_residencia_id" class="form-label">Tipo de residência*</label>
                        <select class="form-control select-tipo_residencia" id="tipo_residencia_id" name="tipo_residencia_id" required>
                            <option value="">Selecione o tipo de residência</option>
                            <script class="tipo_residencia-template" type="text/x-template">
                                <option value="{{add-select-tipo_residencia_id}}">{{add-select-tipo_residencia_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Contato</label>
                        <input type="text" class="form-control contato" id="telefone" name="telefone" placeholder="Digite o contato">
                    </div>
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data nascimento*</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Digite a data de nascimento" required>
                    </div>
                    <div class="mb-3">
                        <label for="rg" class="form-label">RG*</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o RG" required>
                    </div>
                    <div class="mb-3">
                        <label for="emissao_rg" class="form-label">Data de emissão do RG*</label>
                        <input type="date" class="form-control" id="emissao_rg" name="emissao_rg" placeholder="Digite a data de emissão do RG" required>
                    </div>
                    <div class="mb-3">
                        <label for="genero_id" class="form-label">Gênero*</label>
                        <select class="form-control select-genero" id="genero_id" name="genero_id" required>
                            <option value="">Selecione o gênero</option>
                            <script class="genero-template" type="text/x-template">
                                <option value="{{add-select-genero_id}}">{{add-select-genero_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="etnia_id" class="form-label">Etnia*</label>
                        <select class="form-control select-etnia" id="etnia_id" name="etnia_id" required>
                            <option value="">Selecione a etnia</option>
                            <script class="etnia-template" type="text/x-template">
                                <option value="{{add-select-etnia_id}}">{{add-select-etnia_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="escola_id" class="form-label">Escola*</label>
                        <select class="form-control select-escola" id="escola_id" name="escola_id" required>
                            <option value="">Selecione a escola</option>
                            <script class="escola-template" type="text/x-template">
                                <option value="{{add-select-escola_id}}">{{add-select-escola_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome_responsavel" class="form-label">Nome do responsável*</label>
                        <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" placeholder="Digite o nome do responsável" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_parentesco_id" class="form-label">Tipo de parentesco*</label>
                        <select class="form-control select-tipo_parentesco" id="tipo_parentesco_id" name="tipo_parentesco_id" required>
                            <option value="">Selecione o tipo de parentesco</option>
                            <script class="tipo_parentesco-template" type="text/x-template">
                                <option value="{{add-select-tipo_parentesco_id}}">{{add-select-tipo_parentesco_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome_mae" class="form-label">Nome da mãe*</label>
                        <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Digite o nome da mãe" required>
                    </div>
                    <div class="mb-3">
                        <label for="alfabetizado" class="form-label">Alfabetizado*</label>
                        <select class="form-control" id="alfabetizado" name="alfabetizado" required>
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <button type="submit" class="primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de editar aluno -->
<div class="modal fade" id="editAlunoModal" tabindex="-1" role="dialog" aria-labelledby="editAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlunoModalLabel">Editar aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTurmaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome*</label>
                        <input type="text" class="form-control" id="editar-nome" name="nome" placeholder="Digite o nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF*</label>
                        <input type="text" class="form-control cpf" id="editar-cpf" name="cpf" placeholder="Digite o cpf" required>
                    </div>
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP*</label>
                        <input type="text" class="form-control cep" id="editar-cep" name="cep" placeholder="Digite o cep" required>
                    </div>
                    <div class="mb-3">
                        <label for="rua" class="form-label">Rua*</label>
                        <input type="text" class="form-control" id="editar-rua" name="rua" placeholder="Digite a rua" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número*</label>
                        <input type="text" class="form-control" id="editar-numero" name="numero" placeholder="Digite o número" required>
                    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="editar-bairro" name="bairro" placeholder="Digite o bairro" required>
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade*</label>
                        <input type="text" class="form-control" id="editar-cidade" name="cidade" placeholder="Digite a cidade" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_residencia_id" class="form-label">Tipo de residência*</label>
                        <select class="form-control select-tipo_residencia" id="editar-tipo_residencia_id" name="tipo_residencia_id" required>
                            <option value="">Selecione o tipo de residência</option>
                            <script class="tipo_residencia-template" type="text/x-template">
                                <option value="{{add-select-tipo_residencia_id}}">{{add-select-tipo_residencia_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Contato</label>
                        <input type="text" class="form-control contato" id="editar-telefone" name="telefone" placeholder="Digite o contato">
                    </div>
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data nascimento*</label>
                        <input type="date" class="form-control" id="editar-nascimento" name="nascimento" placeholder="Digite a data de nascimento" required>
                    </div>
                    <div class="mb-3">
                        <label for="rg" class="form-label">RG*</label>
                        <input type="text" class="form-control" id="editar-rg" name="rg" placeholder="Digite o RG" required>
                    </div>
                    <div class="mb-3">
                        <label for="emissao_rg" class="form-label">Data de emissão do RG*</label>
                        <input type="date" class="form-control" id="editar-emissao_rg" name="emissao_rg" placeholder="Digite a data de emissão do RG" required>
                    </div>
                    <div class="mb-3">
                        <label for="genero_id" class="form-label">Gênero*</label>
                        <select class="form-control select-genero" id="editar-genero_id" name="genero_id" required>
                            <option value="">Selecione o gênero</option>
                            <script class="genero-template" type="text/x-template">
                                <option value="{{add-select-genero_id}}">{{add-select-genero_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="etnia_id" class="form-label">Etnia*</label>
                        <select class="form-control select-etnia" id="editar-etnia_id" name="etnia_id" required>
                            <option value="">Selecione a etnia</option>
                            <script class="etnia-template" type="text/x-template">
                                <option value="{{add-select-etnia_id}}">{{add-select-etnia_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="escola_id" class="form-label">Escola*</label>
                        <select class="form-control select-escola" id="editar-escola_id" name="escola_id" required>
                            <option value="">Selecione a escola</option>
                            <script class="escola-template" type="text/x-template">
                                <option value="{{add-select-escola_id}}">{{add-select-escola_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome_responsavel" class="form-label">Nome do responsável*</label>
                        <input type="text" class="form-control" id="editar-nome_responsavel" name="nome_responsavel" placeholder="Digite o nome do responsável" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_parentesco_id" class="form-label">Tipo de parentesco*</label>
                        <select class="form-control select-tipo_parentesco" id="editar-tipo_parentesco_id" name="tipo_parentesco_id" required>
                            <option value="">Selecione o tipo de parentesco</option>
                            <script class="tipo_parentesco-template" type="text/x-template">
                                <option value="{{add-select-tipo_parentesco_id}}">{{add-select-tipo_parentesco_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nome_mae" class="form-label">Nome da mãe*</label>
                        <input type="text" class="form-control" id="editar-nome_mae" name="nome_mae" placeholder="Digite o nome da mãe" required>
                    </div>
                    <div class="mb-3">
                        <label for="alfabetizado" class="form-label">Alfabetizado*</label>
                        <select class="form-control" id="editar-alfabetizado" name="alfabetizado" required>
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <input type="hidden" id="editar-id">
                    <button type="submit" class="primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(async function() {
        indexPage();
        indexEtnias();
        indexEscolas();
        indexGeneros();
        indexTipoParentescos();
        indexTipoResidencias();
    });

    async function indexPage(){
        const data = await getFetch('<?= $API_URL ?>alunos');
        const table_body = $('#table-alunos');
        const table_template = $('#table-template').html();
        table_body.empty();

        if (data.length > 0) {
            data.forEach(item => {
                const row = table_template
                    .replace('{{id}}', item.id)
                    .replace('{{id}}', item.id)
                    .replace('{{nome}}', item.nome)
                    .replace('{{nome}}', item.nome)
                    .replace('{{cpf}}', item.cpf)
                    .replace('{{cpf}}', item.cpf)
                    .replace('{{cep}}', item.cep)
                    .replace('{{rua}}', item.rua)
                    .replace('{{numero}}', item.numero)
                    .replace('{{bairro}}', item.bairro)
                    .replace('{{cidade}}', item.cidade)
                    .replace('{{telefone}}', item.telefone)
                    .replace('{{rg}}', item.rg)
                    .replace('{{emissao_rg}}', item.emissao_rg)
                    .replace('{{nascimento}}', item.nascimento)
                    .replace('{{genero_id}}', item.genero_id)
                    .replace('{{etnia_id}}', item.etnia_id)
                    .replace('{{escola_id}}', item.escola_id)
                    .replace('{{tipo_residencia_id}}', item.tipo_residencia_id)
                    .replace('{{tipo_parentesco_id}}', item.tipo_parentesco_id)
                    .replace('{{nome_responsavel}}', item.nome_responsavel)
                    .replace('{{nome_mae}}', item.nome_mae)
                    .replace('{{alfabetizado}}', item.alfabetizado);

                table_body.append(row);
            });
        } else {
            const row = '<tr><td colspan="4">Nenhum resultado encontrado.</td></tr>';
            table_body.append(row);
        }

        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Tem certeza que deseja excluir?',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Sim',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteFetch('<?= $API_URL ?>alunos/delete/' + $(this).data('id'));
                }
            });
        });

        $('.edit-button').on('click', function(e) {
            $('#editar-id').val($(this).data('id'));
            $('#editar-nome').val($(this).data('nome'));
            $('#editar-cpf').val($(this).data('cpf'));
            $('#editar-cep').val($(this).data('cep'));
            $('#editar-rua').val($(this).data('rua'));
            $('#editar-numero').val($(this).data('numero'));
            $('#editar-bairro').val($(this).data('bairro'));
            $('#editar-cidade').val($(this).data('cidade'));
            $('#editar-telefone').val($(this).data('telefone'));
            $('#editar-rg').val($(this).data('rg'));
            $('#editar-emissao_rg').val($(this).data('emissao_rg'));
            $('#editar-nascimento').val($(this).data('nascimento'));
            $('#editar-genero_id').val($(this).data('genero_id'));
            $('#editar-etnia_id').val($(this).data('etnia_id'));
            $('#editar-escola_id').val($(this).data('escola_id'));
            $('#editar-tipo_residencia_id').val($(this).data('tipo_residencia_id'));
            $('#editar-tipo_parentesco_id').val($(this).data('tipo_parentesco_id'));
            $('#editar-nome_responsavel').val($(this).data('nome_responsavel'));
            $('#editar-nome_mae').val($(this).data('nome_mae'));
            $('#editar-alfabetizado').val($(this).data('alfabetizado'));
        });
    }

    async function indexEtnias(){
        const data = await getFetch('<?= $API_URL ?>etnias');
        const select_body = $('.select-etnia');
        const etnias_template = $('.etnia-template').html();
        select_body.empty();

        const option = '<option value="">Selecione a etnia</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = etnias_template
                    .replace('{{add-select-etnia_id}}', item.id)
                    .replace('{{add-select-etnia_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    async function indexEscolas(){
        const data = await getFetch('<?= $API_URL ?>escolas');
        const select_body = $('.select-escola');
        const escolas_template = $('.escola-template').html();
        select_body.empty();

        const option = '<option value="">Selecione a escola</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = escolas_template
                    .replace('{{add-select-escola_id}}', item.id)
                    .replace('{{add-select-escola_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    async function indexGeneros(){
        const data = await getFetch('<?= $API_URL ?>generos');
        const select_body = $('.select-genero');
        const generos_template = $('.genero-template').html();
        select_body.empty();

        const option = '<option value="">Selecione o gênero</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = generos_template
                    .replace('{{add-select-genero_id}}', item.id)
                    .replace('{{add-select-genero_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    async function indexTipoParentescos(){
        const data = await getFetch('<?= $API_URL ?>tipo_parentescos');
        const select_body = $('.select-tipo_parentesco');
        const tipo_parentescos_template = $('.tipo_parentesco-template').html();
        select_body.empty();

        const option = '<option value="">Selecione o tipo de parentesco</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = tipo_parentescos_template
                    .replace('{{add-select-tipo_parentesco_id}}', item.id)
                    .replace('{{add-select-tipo_parentesco_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    async function indexTipoResidencias(){
        const data = await getFetch('<?= $API_URL ?>tipo_residencias');
        const select_body = $('.select-tipo_residencia');
        const tipo_residencias_template = $('.tipo_residencia-template').html();
        select_body.empty();

        const option = '<option value="">Selecione o tipo de residência</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = tipo_residencias_template
                    .replace('{{add-select-tipo_residencia_id}}', item.id)
                    .replace('{{add-select-tipo_residencia_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    $('#addAlunoForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        postFetch(formData, '<?= $API_URL ?>alunos/create');
    });

    $('#editTurmaForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData();

        formData.append('nome', $('#editar-nome').val());
        formData.append('cpf', $('#editar-cpf').val());
        formData.append('cep', $('#editar-cep').val());
        formData.append('rua', $('#editar-rua').val());
        formData.append('numero', $('#editar-numero').val());
        formData.append('cidade', $('#editar-cidade').val());
        formData.append('bairro', $('#editar-bairro').val());
        formData.append('telefone', $('#editar-telefone').val());
        formData.append('rg', $('#editar-rg').val());
        formData.append('emissao_rg', $('#editar-emissao_rg').val());
        formData.append('nascimento', $('#editar-nascimento').val());
        formData.append('genero_id', $('#editar-genero_id').val());
        formData.append('etnia_id', $('#editar-etnia_id').val());
        formData.append('escola_id', $('#editar-escola_id').val());
        formData.append('tipo_residencia_id', $('#editar-tipo_residencia_id').val());
        formData.append('tipo_parentesco_id', $('#editar-tipo_parentesco_id').val());
        formData.append('nome_responsavel', $('#editar-nome_responsavel').val());
        formData.append('nome_mae', $('#editar-nome_mae').val());
        formData.append('alfabetizado', $('#editar-alfabetizado').val());

        updateFetch(formData, '<?= $API_URL ?>alunos/update/' + $('#editar-id').val());
    });

    $('.cpf').mask('000.000.000-00');
    $('.contato').mask('(00) 00000-0000');
    $('.cep').mask('00000-000');

    const buscaCep = (cep, rua, bairro, cidade) => {
        $(cep).on('blur', function() {
            const cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $(rua).prop('disabled', true);
                $(bairro).prop('disabled', true);
                $(cidade).prop('disabled', true);

                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                    if (!("erro" in data)) {
                        $(rua).val(data.logradouro);
                        $(bairro).val(data.bairro);
                        $(cidade).val(data.localidade);
                    }

                    $(rua).prop('disabled', false);
                    $(bairro).prop('disabled', false);
                    $(cidade).prop('disabled', false);
                });
            }
        });
    };

    buscaCep('#cep', '#rua', '#bairro', '#cidade');
    buscaCep('#editar-cep', '#editar-rua', '#editar-bairro', '#editar-cidade');
</script>
<div style="display: flex; justify-content: space-between;">
    <h2 class="title">Escolas</h2>
    <button type="button" class="primary-button" data-toggle="modal" data-target="#addEscolaModal">
        <i class="fa fa-plus" style="color: white;"></i>
    </button>
</div>

<!-- Tabela de Escolas -->
<div class="table-responsive" style="margin-top: 15px;">
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CEP</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table-escolas">
            <script id="table-template" type="text/x-template">
                <tr>
                    <td>{{nome}}</td>
                    <td>{{cep}}</td>
                    <td>{{rua}}</td>
                    <td>{{numero}}</td>
                    <td>{{bairro}}</td>
                    <td>{{cidade}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-button" data-id="{{id}}" data-nome="{{nome}}" data-cep="{{cep}}" data-rua="{{rua}}" data-numero="{{numero}}" data-cidade="{{cidade}}" data-bairro="{{bairro}}" data-toggle="modal" data-target="#editEscolaModal">
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

<!-- Modal de adicionar escola -->
<div class="modal fade" id="addEscolaModal" tabindex="-1" role="dialog" aria-labelledby="addEscolaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEscolaModalLabel">Adicionar escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEscolaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome*</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
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
                    <button type="submit" class="primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de editar escola -->
<div class="modal fade" id="editEscolaModal" tabindex="-1" role="dialog" aria-labelledby="editEscolaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEscolaModalLabel">Editar escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editEscolaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome*</label>
                        <input type="text" class="form-control" id="editar-nome" name="nome" placeholder="Digite o nome" required>
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
    });

    async function indexPage(){
        const data = await getFetch('<?= $API_URL ?>escolas');
        const table_body = $('#table-escolas');
        const table_template = $('#table-template').html();
        table_body.empty();

        if (data.length > 0) {
            data.forEach(item => {
                const row = table_template
                    .replace('{{id}}', item.id)
                    .replace('{{id}}', item.id)
                    .replace('{{nome}}', item.nome)
                    .replace('{{nome}}', item.nome)
                    .replace('{{cep}}', item.cep)
                    .replace('{{cep}}', item.cep)
                    .replace('{{rua}}', item.rua)
                    .replace('{{rua}}', item.rua)
                    .replace('{{numero}}', item.numero)
                    .replace('{{numero}}', item.numero)
                    .replace('{{bairro}}', item.bairro)
                    .replace('{{bairro}}', item.bairro)
                    .replace('{{cidade}}', item.cidade)
                    .replace('{{cidade}}', item.cidade);

                table_body.append(row);
            });
        } else {
            const row = '<tr><td colspan="8">Nenhum resultado encontrado.</td></tr>';
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
                    deleteFetch('<?= $API_URL ?>escolas/delete/' + $(this).data('id'));
                }
            });
        });

        $('.edit-button').on('click', function(e) {
            $('#editar-id').val($(this).data('id'));
            $('#editar-nome').val($(this).data('nome'))
            $('#editar-cep').val($(this).data('cep'))
            $('#editar-rua').val($(this).data('rua'))
            $('#editar-numero').val($(this).data('numero'))
            $('#editar-bairro').val($(this).data('bairro'))
            $('#editar-cidade').val($(this).data('cidade'));
        });
    }

    $('#addEscolaForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        postFetch(formData, '<?= $API_URL ?>escolas/create');
    });

    $('#editEscolaForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData();

        formData.append('nome', $('#editar-nome').val());
        formData.append('cep', $('#editar-cep').val());
        formData.append('rua', $('#editar-rua').val());
        formData.append('numero', $('#editar-numero').val());
        formData.append('cidade', $('#editar-cidade').val());
        formData.append('bairro', $('#editar-bairro').val());

        updateFetch(formData, '<?= $API_URL ?>escolas/update/' + $('#editar-id').val());
    });

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
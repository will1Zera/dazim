<div style="display: flex; justify-content: space-between;">
    <h2 class="title">Turmas</h2>
    <button type="button" class="primary-button" data-toggle="modal" data-target="#addTurmaModal">
        <i class="fa fa-plus" style="color: white;"></i>
    </button>
</div>

<!-- Tabela de Turmas -->
<div class="table-responsive" style="margin-top: 15px;">
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Turno</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table-turmas">
            <script id="table-template" type="text/x-template">
                <tr>
                    <td>{{nome}}</td>
                    <td>{{ano}}</td>
                    <td>{{turno_nome}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-button" data-id="{{id}}" data-nome="{{nome}}" data-ano="{{ano}}" data-turno_id="{{turno_id}}" data-toggle="modal" data-target="#editTurmaModal">
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

<!-- Modal de adicionar turma -->
<div class="modal fade" id="addTurmaModal" tabindex="-1" role="dialog" aria-labelledby="addTurmaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTurmaModalLabel">Adicionar turma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTurmaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome*</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano*</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Digite o ano" required>
                    </div>
                    <div class="mb-3">
                        <label for="turno_id" class="form-label">Turno*</label>
                        <select class="form-control select-turno" id="turno_id" name="turno_id" required>
                            <option value="">Selecione o turno</option>
                            <script class="turno-template" type="text/x-template">
                                <option value="{{add-select-turno_id}}">{{add-select-turno_nome}}</option>
                            </script>
                        </select>
                    </div>
                    <button type="submit" class="primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de editar turma -->
<div class="modal fade" id="editTurmaModal" tabindex="-1" role="dialog" aria-labelledby="editTurmaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTurmaModalLabel">Editar turma</h5>
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
                        <label for="ano" class="form-label">Ano*</label>
                        <input type="text" class="form-control" id="editar-ano" name="ano" placeholder="Digite o ano" required>
                    </div>
                    <div class="mb-3">
                        <label for="turno_id" class="form-label">Turno*</label>
                        <select class="form-control select-turno" id="editar-turno_id" name="turno_id" required>
                            <option value="">Selecione o turno</option>
                            <script class="turno-template" type="text/x-template">
                                <option value="{{add-select-turno_id}}">{{add-select-turno_nome}}</option>
                            </script>
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
        indexTurnos()
    });

    async function indexPage(){
        const data = await getFetch('<?= $API_URL ?>turmas');
        const table_body = $('#table-turmas');
        const table_template = $('#table-template').html();
        table_body.empty();

        if (data.length > 0) {
            data.forEach(item => {
                const row = table_template
                    .replace('{{id}}', item.id)
                    .replace('{{id}}', item.id)
                    .replace('{{nome}}', item.nome)
                    .replace('{{nome}}', item.nome)
                    .replace('{{ano}}', item.ano)
                    .replace('{{ano}}', item.ano)
                    .replace('{{turno_id}}', item.turno_id)
                    .replace('{{turno_nome}}', item.turno_nome);

                table_body.append(row);
            });
        } else {
            const row = '<tr><td colspan="5">Nenhum resultado encontrado.</td></tr>';
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
                    deleteFetch('<?= $API_URL ?>turmas/delete/' + $(this).data('id'));
                }
            });
        });

        $('.edit-button').on('click', function(e) {
            $('#editar-id').val($(this).data('id'));
            $('#editar-nome').val($(this).data('nome'))
            $('#editar-ano').val($(this).data('ano'))
            $('#editar-turno_id').val($(this).data('turno_id'));
        });
    }

    async function indexTurnos(){
        const data = await getFetch('<?= $API_URL ?>turnos');
        const select_body = $('.select-turno');
        const turnos_template = $('.turno-template').html();
        select_body.empty();

        const option = '<option value="">Selecione o turno</option>';
        select_body.append(option);

        if (data.length > 0) {
            data.forEach(item => {
                const option = turnos_template
                    .replace('{{add-select-turno_id}}', item.id)
                    .replace('{{add-select-turno_nome}}', item.nome);

                select_body.append(option);
            });
        }
    }

    $('#addTurmaForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        postFetch(formData, '<?= $API_URL ?>turmas/create');
    });

    $('#editTurmaForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData();

        formData.append('nome', $('#editar-nome').val());
        formData.append('ano', $('#editar-ano').val());
        formData.append('turno_id', $('#editar-turno_id').val());

        updateFetch(formData, '<?= $API_URL ?>turmas/update/' + $('#editar-id').val());
    });
</script>
<div style="display: flex; justify-content: space-between;">
    <h2 class="title">Etnias</h2>
    <button type="button" class="primary-button" data-toggle="modal" data-target="#addEtniaModal">
        <i class="fa fa-plus" style="color: white;"></i>
    </button>
</div>

<!-- Tabela de Etnias -->
<div class="table-responsive" style="margin-top: 15px;">
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table-etnias">
            <script id="table-template" type="text/x-template">
                <tr>
                    <td>{{nome}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit-button" data-id="{{id}}" data-nome="{{nome}}" data-toggle="modal" data-target="#editEtniaModal">
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

<!-- Modal de adicionar etnia -->
<div class="modal fade" id="addEtniaModal" tabindex="-1" role="dialog" aria-labelledby="addEtniaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEtniaModalLabel">Adicionar etnia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEtniaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
                    </div>
                    <button type="submit" class="primary-button">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de editar etnia -->
<div class="modal fade" id="editEtniaModal" tabindex="-1" role="dialog" aria-labelledby="editEtniaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEtniaModalLabel">Editar etnia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editEtniaForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="editar-nome" name="nome" placeholder="Digite o nome" required>
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
        const data = await getFetch('<?= $API_URL ?>etnias');
        const table_body = $('#table-etnias');
        const table_template = $('#table-template').html();
        table_body.empty();

        if (data.length > 0) {
            data.forEach(item => {
                const row = table_template
                    .replace('{{id}}', item.id)
                    .replace('{{id}}', item.id)
                    .replace('{{nome}}', item.nome)
                    .replace('{{nome}}', item.nome);

                table_body.append(row);
            });
        } else {
            const row = '<tr><td colspan="3">Nenhum resultado encontrado.</td></tr>';
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
                    deleteFetch('<?= $API_URL ?>etnias/delete/' + $(this).data('id'));
                }
            });
        });

        $('.edit-button').on('click', function(e) {
            $('#editar-id').val($(this).data('id'));
            $('#editar-nome').val($(this).data('nome'));
        });
    }

    $('#addEtniaForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        postFetch(formData, '<?= $API_URL ?>etnias/create');
    });

    $('#editEtniaForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData();

        formData.append('nome', $('#editar-nome').val());

        updateFetch(formData, '<?= $API_URL ?>etnias/update/' + $('#editar-id').val());
    });
</script>
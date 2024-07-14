<!-- MENU LATERAL ESQUERDO -->
<section id="sidebar">
    <a href="#" class="brand"><i class="fa fa-ravelry icon"></i> <span data-text="Dazim" class="sidebar-span">Dazim</span></i></a>
    <ul class="side-menu">
        <li><a href="<?= $URL ?>home"><i class="fa fa-home icon"></i> <span data-text="Home" class="sidebar-span">Home</span></a></li>
        <li>
            <a href="#"><i class="fa fa-tag icon"></i> <span data-text="Cadastros" class="sidebar-span">Cadastros</span></a>
            <ul class="side-dropdown">
                <li><a href="<?= $URL ?>etnias"><span data-text="Etnias" class="sidebar-span">Etnias</span></a></li>
                <li><a href="<?= $URL ?>escolas"><span data-text="Escolas" class="sidebar-span">Escolas</span></a></li>
                <li><a href="<?= $URL ?>turnos"><span data-text="Turnos" class="sidebar-span">Turnos</span></a></li>
                <li><a href="<?= $URL ?>generos"><span data-text="Gêneros" class="sidebar-span">Gêneros</span></a></li>
                <li><a href="<?= $URL ?>parentescos"><span data-text="Parentescos" class="sidebar-span">Parentescos</span></a></li>
                <li><a href="<?= $URL ?>residencias"><span data-text="Residências" class="sidebar-span">Residências</span></a></li>
            </ul>
        </li>
        <li><a href="<?= $URL ?>alunos"><i class="fa fa-graduation-cap icon"></i> <span data-text="Alunos" class="sidebar-span">Alunos</span></a></li>
        <li><a href="<?= $URL ?>turmas"><i class="fa fa-folder-open icon"></i> <span data-text="Turmas" class="sidebar-span">Turmas</span></a></li>
    </ul>
</section>

<!-- MENU SUPERIOR -->
<section id="content">
    <nav>
        <i class="fa fa-bars icon toggle-sidebar"></i>
        <div class="profile">
            <ul class="profile-link">
                <li><a href="#" class="profile-option" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-user icon"></i></a></li>
                <li><a href="#" id="logout" class="profile-option"><i class="fa fa-sign-out icon"></i></a></li>
            </ul>
        </div>
    </nav>

    <!-- Modal de editar perfil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Editar perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome*</label>
                            <input type="text" class="form-control" id="editar-nome-profile" name="nome" placeholder="Digite o nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="text" class="form-control" id="editar-email-profile" name="email" placeholder="Digite o email" required>
                        </div>
                        <button type="submit" class="primary-button">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <main>
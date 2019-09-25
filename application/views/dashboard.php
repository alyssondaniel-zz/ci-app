<div class="row">
    <?php $this->load->view('templates/sidebar'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                    <button class="btn btn-sm btn-outline-secondary">Exportar</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    Esta semana
                </button>
            </div>
        </div>
        <p>Seja bem vindo, <?= $user->name ?>!</p>
    </main>
</div>

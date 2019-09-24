<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-6">
            <h2>Listando usuários</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="/users/new" role="button">Novo usuário</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Matrícula</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $user): ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->name ?></td>
                            <td><?= $user->matriculation ?></td>
                            <td><?= $user->status ? 'Ativo' : 'Inativo' ?></td>
                            <td><?= nice_date($user->created_at,'d/m/Y H:i:s') ?></td>
                            <td>
                                <a href="<?= base_url('users/edit/'.$user->id)?>"><span data-feather="edit"></span></a>
                                | <?=anchor(base_url("users/remover/".$user->id),"<span data-feather='trash-2'></span>",array('onclick' => "return confirm('Você tem certeza que deseja remover esse usuário?')"))?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

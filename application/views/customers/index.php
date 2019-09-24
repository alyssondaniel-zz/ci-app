<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-6">
            <h2>Listando clientes</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="/customers/new" role="button">Novo</a>
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
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Renda</th>
                        <th>Cadastrado por</th>
                        <th>Criado em</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $customer): ?>
                        <tr>
                            <td><?= $customer->id ?></td>
                            <td><?= $customer->name ?></td>
                            <td><?= $customer->document ?></td>
                            <td><?= $customer->registry ?></td>
                            <td><?= $customer->address ?></td>
                            <td><?= $customer->address_number ?></td>
                            <td><?= $customer->address_city ?></td>
                            <td><?= $customer->address_state ?></td>
                            <td><?= number_format($customer->income, 2, '.', '') ?></td>
                            <td><?= $customer->user_name ?></td>
                            <td><?= nice_date($customer->created_at,'d/m/Y H:i:s') ?></td>
                            <td><?= $customer->status ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a href="<?= base_url('customers/edit/'.$customer->id)?>"><span data-feather="edit"></span></a>
                                | <?=anchor(base_url("customers/remover/".$customer->id),"<span data-feather='trash-2'></span>",array('onclick' => "return confirm('Você tem certeza que deseja remover esse usuário?')"))?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

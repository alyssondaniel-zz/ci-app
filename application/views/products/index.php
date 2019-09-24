<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col-6">
            <h2>Listando produtos</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="/products/new" role="button">Novo</a>
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
                        <th>Descrição</th>
                        <th>Preço a vista</th>
                        <th>Preço a prazo</th>
                        <th>Código de barras</th>
                        <th>Cadastrado por</th>
                        <th>Criado em</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $product): ?>
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><?= $product->description ?></td>
                            <td><?= number_format($product->cash_price, 2, '.', '') ?></td>
                            <td><?= number_format($product->forward_price, 2, '.', '') ?></td>
                            <td><?= $product->barcode ?></td>
                            <td><?= $product->user_name ?></td>
                            <td><?= nice_date($product->created_at,'d/m/Y H:i:s') ?></td>
                            <td><?= $product->status ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a href="<?= base_url('products/edit/'.$product->id)?>"><span data-feather="edit"></span></a>
                                | <?=anchor(base_url("products/remover/".$product->id),"<span data-feather='trash-2'></span>",array('onclick' => "return confirm('Você tem certeza que deseja remover esse usuário?')"))?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

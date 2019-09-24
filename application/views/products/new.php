<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col">
            <h2 class="title">Novo produto</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
            }
            ?>

            <form action="<?= base_url('products/create') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Descrição</label>
                        <input id="description" name="description" class="form-control" type="text" placeholder="Digite uma descrição" aria-describedby="descriptionHelp" value="<?php echo set_value('description'); ?>">
                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">Preço a vista</label>
                        <input id="cash_price" name="cash_price" class="form-control input-cash-price text-right" type="text" placeholder="Digite o preço a vista" aria-describedby="cash_priceHelp" value="<?php echo set_value('cash_price'); ?>">
                        <span class="text-danger"><?php echo form_error('cash_price'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">Preço a prazo</label>
                        <input id="forward_price" name="forward_price" class="form-control input-forward-price text-right" type="text" placeholder="Digite o preço a prazo" aria-describedby="forward_priceHelp" value="<?php echo set_value('forward_price'); ?>">
                        <span class="text-danger"><?php echo form_error('forward_price'); ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label class="label">Código de Barras</label>
                        <input id="barcode" name="barcode" class="form-control input-barcode" type="text" placeholder="Digite o código de barras" aria-describedby="barcodeHelp" value="<?php echo set_value('barcode'); ?>">
                        <span class="text-danger"><?php echo form_error('barcode'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Ativo
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Criar</button>
            </form>
            <br />
            <a href="<?= base_url('products')?>">Voltar</a>
        </div>
    </div>
</main>

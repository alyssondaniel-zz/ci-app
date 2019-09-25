<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col">
            <h2 class="title">Novo cliente</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
            }
            ?>

            <form action="<?= base_url('customers/create') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Nome</label>
                        <input id="name" name="name" class="form-control" type="text" placeholder="Digite um nome" aria-describedby="nameHelp" value="<?php echo set_value('name'); ?>">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">CPF</label>
                        <input id="document" name="document" class="form-control input-document text-right" type="text" placeholder="Digite o CPF" aria-describedby="documentHelp" value="<?php echo set_value('document'); ?>">
                        <span class="text-danger"><?php echo form_error('document'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">RG</label>
                        <input id="registry" name="registry" class="form-control input-registry text-right" type="text" placeholder="Digite o RG" aria-describedby="registryHelp" value="<?php echo set_value('registry'); ?>">
                        <span class="text-danger"><?php echo form_error('registry'); ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="label">Endereço</label>
                        <input id="address" name="address" class="form-control" type="text" placeholder="Digite o endereço" aria-describedby="addressHelp" value="<?php echo set_value('address'); ?>">
                        <span class="text-danger"><?php echo form_error('address'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label">Número</label>
                        <input id="address_number" name="address_number" class="form-control" type="text" placeholder="Digite o número" aria-describedby="address_numberHelp" value="<?php echo set_value('address_number'); ?>">
                        <span class="text-danger"><?php echo form_error('address_number'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label">Cidade</label>
                        <input id="address_city" name="address_city" class="form-control" type="text" placeholder="Digite a cidade" aria-describedby="address_cityHelp" value="<?php echo set_value('address_city'); ?>">
                        <span class="text-danger"><?php echo form_error('address_city'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label">Estado</label>
                        <input id="address_state" name="address_state" class="form-control" type="text" placeholder="Digite o estado" aria-describedby="address_stateHelp" value="<?php echo set_value('address_state'); ?>">
                        <span class="text-danger"><?php echo form_error('address_state'); ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="label">Renda</label>
                        <input id="income" name="income" class="form-control input-income text-right" type="text" placeholder="Digite a renda" aria-describedby="incomeHelp" value="<?php echo set_value('income'); ?>">
                        <span class="text-danger"><?php echo form_error('income'); ?></span>
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
            <a href="<?= base_url('customers')?>">Voltar</a>
        </div>
    </div>
</main>
<script>
new Cleave('.input-document', {
    delimiters: ['.', '.', '-'],
    blocks: [3, 3, 3, 2],
    uppercase: true
});

new Cleave('.input-registry', {
    numeral: true,
    numeralDecimalMark: ',',
    delimiter: '.'
});

new Cleave('.input-income', {
    numeral: true,
    numeralDecimalMark: '.',
    delimiter: ''
});
</script>

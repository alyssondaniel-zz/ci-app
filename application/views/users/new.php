<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col">
            <h2 class="title">Edit User</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                echo '<div class="alert alert-success">'.$this->session->flashdata("message").'</div>';
            }
            ?>

            <form action="<?= base_url('users/create') ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="label">Name</label>
                        <input id="name" name="name" class="form-control" type="text" placeholder="Digite o nome" aria-describedby="nameHelp" value="<?php echo set_value('name'); ?>">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">Matriculation</label>
                        <input id="matriculation" name="matriculation" class="form-control" type="text" placeholder="Digite a matrícula" aria-describedby="matriculationHelp" value="<?php echo set_value('matriculation'); ?>">
                        <span class="text-danger"><?php echo form_error('matriculation'); ?></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="label">Senha</label>
                        <input id="password" name="password" class="form-control" type="password" placeholder="Digite a senha" aria-describedby="passwordHelp" value="<?php echo set_value('password'); ?>">
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
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
                <button class="btn btn-primary" type="submit">Create User</button>
            </form>
            <br />
            <a href="<?= base_url('users')?>">Voltar</a>
        </div>
    </div>
</main>

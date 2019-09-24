<?php $this->load->view('templates/sidebar'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
        <div class="col">
            <h2 class="title">Edit User</h2>

            <?php
            if($this->session->flashdata('message'))
            {
                echo '
                <div class="alert alert-success">
                '.$this->session->flashdata("message").'
                </div>
                ';
            }
            ?>

            <form action="<?= base_url('users/update/'.$data->id) ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="label">Name</label>
                        <input id="name" name="name" class="form-control" type="text" value="<?= $data->name ?>" placeholder="Type the name" aria-describedby="nameHelp">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label">Matriculation</label>
                        <input id="matriculation" name="matriculation" class="form-control" type="text" value="<?= $data->matriculation ?>" placeholder="Type the matriculation" aria-describedby="matriculationHelp">
                        <span class="text-danger"><?php echo form_error('matriculation'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" id="gridCheck" <?= $data->status ? 'checked' : '' ?>>
                        <label class="form-check-label" for="gridCheck">
                            Ativo
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update User</button>
            </form>
            <br />
            <a href="<?= base_url('users')?>">Voltar</a>
        </div>
    </div>
</main>

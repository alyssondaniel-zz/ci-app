<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Template de login, usando Bootstrap.</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="<?php echo base_url(); ?>users/validation">
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
        <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
        <label for="inputEmail" class="sr-only">Matriculation</label>
        <input name="matriculation" type="text" id="inputEmail" class="form-control" placeholder="Sua matricula" value="<?php echo set_value('matriculation'); ?>" required autofocus>
        <span class="text-danger"><?php echo form_error('matriculation'); ?></span>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Senha" value="<?php echo set_value('password'); ?>" required>
        <span class="text-danger"><?php echo form_error('password'); ?></span>
        <!-- <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Lembrar de mim
    </label>
</div> -->
<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>

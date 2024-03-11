<?php
header("Cache-Control: no-cache, must-revalidate");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/js/panel/fontawesome-free/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/icon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/c/icono.png" rel="icon">
    
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

     <link href="<?= base_url(); ?>assets/css/signin.css" rel="stylesheet">
   

</head>

<body class="text-center">
    
    <form class="form-signin"  method="post" action="<?= base_url('login') ?>">
      <img class="mb-4" src="assets/imgs/logotienda.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 font-weight-normal"><b>Autenticación</b></h1>
      <?php if (isset($validation)) : ?>
            <div class="mb-3">
               <div class="alert alert-danger" role="alert">
                   
                    <?php 
                    $errors= $validation->getErrors();
                    foreach ($errors as $error): ?>
                        <?=esc($error)?><br/>
                    <?php endforeach ?>  
                </div>
            </div>
      <?php endif; ?>
      <label for="inputEmail" class="sr-only">Cédula</label>
      <input type="text" id="usuario" name ="usuario" class="form-control"  maxlength="10" minlength="3" placeholder="Ingrese su usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Clave</label>
      <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required minlength="6">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordar mi sesión</label>
      </div>
      <div class="row">
        <div class="col">
          <a  href="<?=base_url()?>" class="btn w-100  btn-secondary"><b>
          <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Cancelar</b></a> 
        </div>
        <div class="col">
          <button class="btn w-100  btn-primary " type="submit">
              <b><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</b></button>
        </div>
       
      </div>
      
      <p class="mt-5 mb-3 text-muted">&copy; 2024</p> </form>
  



    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap46/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>

   
    <script type="text/javascript">
       
       
    </script>

</body>

</html>
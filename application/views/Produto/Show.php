<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sate Sate Software</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>public/css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Sate Sate Software</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= site_url('welcome'); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" id="principal">

        <form id="form_prod" action="SelecionarCompra" method="get">

        <div class="col-lg-9">

            <div class="form-group" style="text-align:center;">
                <h1>Produto encontrado!</h1>
            </div>

          <div class="row" style="margin-left:200px;">

          <?php

          foreach ($produtos as $result): ?>         

            <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $result->id_produto; ?>">
            <div class="col-lg-8 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>public/img/Edit.png" alt=""></a>
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $result->nome; ?>
                  </h5>
                    <p class="card-text"><?php echo $result->descricao; ?></p>
                    <p class="card-text"><?php echo "Valor: R$". $result->valor; ?></p>
                    <input type="submit" value="Comprar" class="btn btn-success">
                    <input type="button" value="Retornar" class="btn btn-primary">
                </div>
                
              </div>

            </div>

           <?php endforeach; ?>
 
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      <!-- /.row -->

    </form>

    </div>
    <!-- /.container -->

    <!-- Footer
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      /.container
    </footer>-->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

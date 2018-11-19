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

    <form id="prod_adicional" action="Produto/selecionarAdicional" method="post">
      <div class="row">

        <div class="col-lg-9">

          <div class="form-group">
                    <h2>Escolha o software e configurações adicionais</h2>
                </div>

                <div class="form-group">

                    <label for="tipo">Escolha o software:</label>
                    <select class="form-control" id="id_produto" name="id_produto">
                    <option value="">Selecione</option>
                    <?php foreach ($produtos as $result): ?>
                        <option value="<?php  echo $result->id_produto; ?>"><?php echo $result->nome." - R$". $result->valor; ?></option>   
                    <?php endforeach;?>
                    </select>

                </div>

                <div class="form-group">

                    <label for="tipo">Escolha as funções adicionais:</label>
                    
                    <?php foreach ($adicionais as $result): ?>
                    <div class="form-check">
                    <label>
                        <input type="checkbox" value="<?php  echo $result->id_adicional; ?>" name="check[]">
                        <input type="hidden" value="<?php  echo $result->valor_adicional; ?>" id="valor_adicional<?php echo $result->id_adicional; ?>">
                        <span class="label-text"><?php  echo $result->nome. " - R$: ". $result->valor_adicional ?> </span>
                    </label>
                    </div>
                    <?php endforeach;?>

                    </div>

                    <div class="form-group">
                        <p class="lead" id="valor"> Total Adicional: R$ 0</p>
                        <input type="hidden" id="valor_add" value="" name="valor_add">
                    </div>

                    <button class="btn btn-success">Comprar</button>

            </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
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

    <script type="text/javascript">
      $(document).ready(function () {
        
        $("form :checkbox").click(function () {
          var total = 0;
          $('form :checkbox:checked').each(function () {
              total += parseFloat($("#valor_adicional"+this.value).val());
          });
            $("#valor").text("Total Adicional: R$ " + total+".00");
            $("#valor_add").val(total+".00");
        });
      });

      $("#prod_adicional").submit(function() {
            if ($("#id_produto").val() == "") {
                alert("Selecione o produto");
                return false;        
            }
            if( $("form :checkbox").is(":checked") == false ){
              alert("Selecione no minimo 1 (uma) função adicional");
                return false;
            }
        });
      
    </script>

  </body>

</html>

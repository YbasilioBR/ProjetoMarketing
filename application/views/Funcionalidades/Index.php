<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

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

    <form id="form_func" action="Produto/carregarProduto" method="get">
    <!-- Page Content -->
    <div class="container" id="principal">

        <div class="row">

            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="form-group">
                    <h1>Escolha seu software ideal</h1>
                </div>

                <div class="form-group">

                    <label for="tipo">Tipo do sistema</label>
                    <select class="form-control" id="tipo" name="tipo">
                    <option value="">Selecione</option>
                    <?php foreach ($tipos as $result): ?>
                        <option value="<?php echo $result->id_tipo; ?>"><?php echo $result->nome; ?></option>
                    <?php endforeach;?>
                    </select>

                </div>

                <div class="form-group">

                    <label for="area">Área de uso do software</label>
                    <select class="form-control" id="area" name="area">
                    <option value="">Selecione</option>
                    <?php foreach ($areas as $result): ?>
                        <option value="<?php echo $result->id_area; ?>"><?php echo $result->nome; ?></option>
                    <?php endforeach;?>
                    </select>

                </div>

                <div class="form-group">

                    <label for="area">Função principal do Software</label>
                    <select class="form-control" id="funcao" name="funcao">
                    <option value="">Selecione</option>
                    <?php foreach ($funcoes as $result): ?>
                        <option value="<?php echo $result->id_funcao; ?>"><?php echo $result->nome; ?></option>
                    <?php endforeach;?>
                    </select>

                </div>

                <div class="form-group">

                    <label for="area">Tipo de relatórios</label>
                    <select class="form-control" id="relatorio" name="relatorio">
                    <option value="">Selecione</option>
                    <?php foreach ($relatorios as $result): ?>
                        <option value="<?php echo $result->id_relatorio; ?>"><?php echo $result->nome; ?></option>
                    <?php endforeach;?>
                    </select>

                </div>
                <!-- /.row -->

                <input type="submit" value="Pesquisar" class="btn btn-success">

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
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

        $("#form_func").submit(function() {
            if ($("#tipo").val() == "") {
                alert("Selecione o tipo do software");
                return false;        
            }
            if ($("#area").val() == "") {
                alert("Selecione a área para o software");
                return false;        
            }
            if ($("#funcao").val() == "") {
                alert("Selecione a função principal do software");
                return false;        
            }
            if ($("#relatório").val() == "") {
                alert("Selecione o tipo de relatório para emitir no software");
                return false;        
            }
        });

    </script>

</body>

</html>
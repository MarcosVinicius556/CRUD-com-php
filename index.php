<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Basic - CRUD</title>

  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 p-2">
        <a class="navbar-brand" href="#">Basic CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=listar-view">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=cadastrar-view">Cadastrar Cliente</a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="container-sm">
        <?php 
            switch (@$_REQUEST['page']) {
                case 'listar-view':
                    include('view/listar-cliente.php');
                    break;
                case 'cadastrar-view':
                    include('view/cadastro-cliente.php');
                    break;
                case 'editar-view':
                    include('view/alteracao-cliente.php');
                    break;
                case 'cliente-controller':
                    include('controller/cliente-controller.php');
                    break;
                default:
                    include('view/listar-cliente.php');
                    break;
            }
        ?>
    </div>
    <script>
        $(document).ready(function () { 
            var $seuCampoCpf = $(".CPF");
            $seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });
        $(document).ready(function(){
            var $seuCampoPhone = $(".TELEFONE");
            $seuCampoPhone.mask('(99) 9999-99999');
        });
    </script>
  </body>
</html>
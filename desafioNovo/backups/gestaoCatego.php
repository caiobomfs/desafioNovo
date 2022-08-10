<?php 
/**
 * Main
 * Pagina principal do site  
 * php version  8.1.4
 * 
 * @category Text/html
 * @package  Apache
 * @author   Caio Bomfim <caiobomfimfc@gmail.com>
 * @license  https://github.com/caiobomfs/testecrud 
 * @link     https://github.com/caiobomfs/testecrud 
 */
//require 'processos.php';
// require './config/config.php';
// require 'combo_categorias.php' ;
require './config/config.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script 
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.slim.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="./CSS/main.css">

    <title>Gestão de Categorias</title>
</head>
<body class="bg-info">
  <header>
    <h1 class="d-flex justify-content-center mb-5 text-white">
    Gestão de Categorias</h1>
  </header>
  <section class="container d-flex justify-content-center mt-5">
    <div class="col-6 align-self-center">
      <div class=" d-flex row justify-content-around mt-5 justify">
        <a  class="col-lg-2"
            href="criarEditCatego.php">
            <button type="button" class="btn btn-light menu_font"  
            id="" >Criar Categoria </button>
        </a>
        <div class="col-lg-2 "
           >
          <button type="button" class="btn btn-light menu_font"data-toggle="modal" 
          data-target="#modalWipe"id="">Deletar Tudo</button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalWipe" 
                tabindex="-1" role="dialog" 
                aria-labelledby="modalWipeLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" 
                  role="document">

                  <div class="modal-content">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="modalWipeLabel">Aviso</h5>
                      <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                      <p class="font_modal">
                        Tem certeza que deseja excluir todas as categorias?
                      </p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary btn-lg" 
                      data-dismiss="modal">Não</button>

                      <a id="" 
                        href="processosGestao.php?deleteAll=1">
                        <button class="btn btn-primary btn-lg" 
                        type="button" >Sim</button>
                      </a> 
                    </div>
                  </div>
                </div>
              </div>
  </section> 
  <section class="rounded mx-3">
    <table class="table table-bordered table-responsive border-dark bg-light">
      <thead>
        <tr class="bg">
          <th scope="col-lg-2" class="col-lg-12">Categoria</th>
          <th scope="col-lg-1" class="col-lg-1 header_imagem"  >
          <img class="img-fluid img_botao" src="./images/lapis.jpg"></th>
          <th scope="col-lg-1" class="col-lg-1 header_imagem" >
          <img class="img-fluid img_botao" src="./images/lixo.jpg"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $query = "SELECT * 
        FROM categorias ";
        $select = $db->query($query);
        while ($categoria = $select->fetch_assoc()) { 
            $idCategoria = $categoria['id']
            ?>

        <tr>
          <td><?php echo $categoria['categoria'] ?></td>
          <td >
                  <a id="anc1" 
                  href="criarEditCatego.php?edit=1&id=<?php echo $categoria['id'];?>" >

                    <button class="btn text-nowrap img_botao padder" 
                    href="criarEditCatego.php?edit=1&id=<?php echo $categoria['id'];?>" 
                    type="button"data-bs-toggle="tooltip" 
                    data-bs-placement="right" title="editar essa categoria" >
                      <img class="img-fluid img_botao" src="./images/cog.jpg">
                    </button>
                  </a>  
                </td>
          <td >
                  <button class="btn text-nowrap img_botao padder" 
                    type="button" data-toggle="modal" 
                    data-target="#modalAviso2<?php echo $idCategoria;?>" 
                    data-bs-toggle="tooltip" data-bs-placement="right" 
                    title="excluir essa categoria" >
                    <img class="img-fluid img_botao" src="./images/del.jpg">
                  </button>
                </td>
        </tr>
        
        <div class="modal fade" id="modalAviso2<?php echo $idCategoria;?>" 
                tabindex="-1" role="dialog" 
                aria-labelledby="modalAviso2Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" 
                  role="document">

                  <div class="modal-content">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="modalAviso2Label">Aviso</h5>
                      <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                      <p class="font_modal">
                        Tem certeza que deseja excluir essa categoria?
                      </p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary btn-lg" 
                      data-dismiss="modal">Não</button>

                      <a id="anc2" 
                        href="processosGestao.php?delete=1&id=<?php echo $categoria['id']?>">
                        <button class="btn btn-primary btn-lg" 
                        type="button" >Sim</button>
                      </a> 
                    </div>
                  </div>
                </div>
              </div>
        <?php  }?>
      </tbody>
    </table>
  </section>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
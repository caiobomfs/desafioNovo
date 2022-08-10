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
require './../../config/config.php';



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
<body class="">
 
  <?php require_once'../menu_principal/index.php'; ?>

  

    <h1 class="d-flex justify-content-center mb-5 text-white">
    Gestão de Categorias</h1>
  </header>
  
  <section class="container  mt-5 mb-4">
    <div class="row">
      <h1 class="col">Minhas Categorias</h1>
      <div class="col d-flex justify-content-end">
        <div class="text-right btn-toolbar ">
          <div class="">
            <button type="button" class="btn border border-dark"data-toggle="modal" 
            data-target="#modalWipe"id="">Deletar Tudo</button>
            <button type="button" class=" btn border border-dark"  
            onclick="link3()">Criar Categoria </button>
        
            <script> function link3(){ location.href="./acoes/criarEditar.php";}</script>
          
          </div>
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
            Tem certeza que deseja excluir todas as categorias?</p>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-secondary btn-lg" 
            data-dismiss="modal">Não</button>
            <button class="btn btn-primary btn-lg" 
            type="button" onclick="link4()">Sim</button>

            <script> function link4(){ location.href="./acoes/processos.php?deleteAll=1";} </script>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <section class="container rounded">
    <table class="table table-bordered">
      <thead>
        <tr class="">
          <th ><input type="checkbox" name="id_categoria"></th>
          <th class="col-lg-3">Titulo</th>
          <th class="col-lg-3">Detalhes</th>
          <th class="col-lg-3">Tags</th>
          <th class="col-lg-2 text-center" colspan="2">Ações</th>
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
          <td><input type="checkbox" name="id_categoria"></td>
          <td><?php echo $categoria['categoria'] ?></td>
          <td></td>
          <td></td>
          <td class="text-center">
            <button  class="border-0 p-0 bg-white" type="button"
              data-bs-toggle="tooltip" data-bs-placement="right" 
              title="editar essa categoria" onclick="link6()" >
              <i class="fa-solid fa-gear fa-3x "></i>
            </button>
            <script> function link6(){ location.href="./acoes/criarEditar.php?edit=1&id=<?php echo $categoria['id'];?>";} </script>
          </td>
          <td class="text-center" >
            <button class="border-0 p-0 bg-white"
              type="button" data-toggle="modal" 
              data-target="#modalAviso2<?php echo $idCategoria;?>" 
              data-bs-toggle="tooltip" data-bs-placement="right" 
              title="excluir essa categoria">
              <i class="fa-solid fa-circle-minus fa-3x"></i>
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
                  Tem certeza que deseja excluir essa categoria?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-secondary btn-lg" 
                  data-dismiss="modal">Não</button>
                 
                  <button class="btn btn-primary btn-lg" 
                   type="button" >Sim</button>
                
                  <script> function link7(){ location.href="./acoes/processos.php?delete=1&id=<?php echo $categoria['id'];?>";} </script>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
      </tbody>
    </table>
  </section>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://kit.fontawesome.com/d0f4eba9df.js" crossorigin="anonymous"></script>
</body>
</html>
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
require './config/config.php';
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    
    <script 
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.slim.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="./CSS/main.css">

    <title>Agenda</title>
  </head>
      
<body class="">
  <header>
    <?php require_once'modulos/menu_principal/index.php'; ?>

    
    <h1 class="d-flex justify-content-center mb-5 ">Bem vindo a agenda Telefonica</h1>
  </header>



<!-- menu-->

  <section class="container mt-5 mb-4">
    <div class="row">
  <h1 class="col">Meus contatos</h1>
    <div class="">
      
        
            <button type="button" class="col d-flex justify-content-end btn border border-dark"  
             onclick="link5()">Criar Contato </button>
       
        <script> function link5(){ location.href="./modulos/acoes/criarEditar.php";}</script>
          
    </div>
  </div>
  </section> 
  
  <section class="container">
    <table class="table table-bordered">
      <thead>
        <tr class="">
          <th class="col-lg-1"><input type="checkbox" name="id_contato"></th>
          <th class="col-lg-1">Categoria</th>
          <th class="col-lg-3">Titulo</th>
          <th class="col-lg-3">detalhes</th>
          <th class="col-lg-2">Telefone</th>
          <th class="col-lg-2">Tags</th>
          <th class="col-lg-2 text-center" colspan="2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //lista contatos
        
        $query = "SELECT co.id, id_categoria, categoria, nome, email, telefone
        FROM contatos co INNER JOIN categorias ca ON 
        co.id_categoria = ca.id;";

        $select = $db->query($query);
        while ($contato = $select->fetch_assoc()) {

            $idContato = $contato['id'];

            ?>
            <tr>
                <td><input type="checkbox" name="id_contato"></td>
                <td><?php echo$contato['categoria']?></td>
                <td><?php echo$contato['nome'] ?></td>
                <td><?php echo$contato['email'] ?></td>
                <td><?php echo$contato['telefone'] ?></td>
                <th></th>
                
                <td class=" text-center">
                  
            
                    <button class="border-0 p-0 bg-white " 
                    type="button" onclick="link()" data-bs-toggle="tooltip" 
                    data-bs-placement="right" title="editar esse contato" >
                    <i class="fa-solid fa-gear fa-3x "></i>
                    </button>
                    <script> function link(){ location.href="./modulos/acoes/criarEditar.php?edit=1&id=<?php echo $contato['id']?>";} </script>
                </td>
                <td class="text-center">
                  <button class="border-0 p-0 bg-white" 
                    type="button" data-toggle="modal" 
                    data-target="#modalAviso<?php echo $idContato;?>" 
                    data-bs-toggle="tooltip" data-bs-placement="right" 
                    title="excluir esse contato" >
                    <i class="fa-solid fa-circle-minus fa-3x"></i>
                  </button>
                </td>
              </tr>
              <div class="modal fade" id="modalAviso<?php echo $idContato;?>" 
                tabindex="-1" role="dialog" 
                aria-labelledby="modalAvisoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" 
                  role="document">

                  <div class="modal-content">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="modalAvisoLabel">Aviso</h5>
                      <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                      <p class="font_modal">
                        Tem certeza que deseja excluir esse contato?
                      </p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary btn-lg" 
                      data-dismiss="modal">Não</button>

                        <button class="btn btn-primary btn-lg" 
                        type="button" onclick="link2()" >Sim</button>
                      
                      <script> function link2(){ location.href="./modulos/acoes/processos.php?delete=1&id=<?php echo $contato['id']?>";} </script> 
                    </div>
                  </div>
                </div>
              </div>
        <?php }?>
      </tbody>  
      </table>
  </section>
        
        

        <br>
        <br>

    
  </script>
  <script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
  crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/d0f4eba9df.js" crossorigin="anonymous"></script>
</body>
</html>

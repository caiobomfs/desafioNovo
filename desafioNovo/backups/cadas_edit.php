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
require './config/config.php';

$acao = 'criar';
$idCategoria  = "";
$nome        = "";
$email       = "";
$telefone    = "";

if (isset($_GET['id'])) {
        $idContato = $_GET['id'];
}
if (isset($idContato)) {

    $acao = 'edit';
    
    $query = "SELECT * FROM contatos where id = $idContato";
    $sql = $db->query($query);
    $contato = $sql->fetch_assoc();

    $idCategoria = $contato['id_categoria'];
    $nome        = $contato['nome'];
    $email       = $contato['email'];
    $telefone    = $contato['telefone'];
    
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.slim.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="./CSS/main.css">

  <title>cadastro e edição</title>
</head>
<body class="bg-info">
  <div class="d-flex justify-content-center">           

      <form action="processos.php" method="post" id="form1">
        <input type="hidden" name="acao" id="acao" value="<?php echo $acao; ?>">
        <input type="hidden" name="id_contato" id="id_contato" value="<?php echo $idContato;?>">
    
        <br>
        <label for="categoria">Categoria</label><br>
        <?php include_once("combo_categorias.php"); 
        ?>

        <br>
        <label for="nome">Nome</label>
        <br>
      
        <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" >

        <br>
        <label for="email">email</label><br>
        <input type="text" name="email" id="email" value="<?php echo $email;?>">

        <br>
        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone" value="<?php echo $telefone;?>" >

        <br>
        <br>
        <input type="submit" value="Salvar contato" id="submit"> 

      </form>  
  </div>
    
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

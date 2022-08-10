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
  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
  
 


$idCategoria = $post['id_categoria'];
$idContato   = $post['id_contato']; 
$nome        = $post['nome'];
$email       = $post['email'];
$telefone    = $post['telefone'];


//Aações
switch ($post['acao']) {
case 'criar':
            
    $query = "INSERT INTO `contatos` (`id_categoria`, `nome`, `email`, `telefone`) 
    VALUES ($idCategoria, '$nome', '$email', '$telefone');";

    break;

case 'edit':
            
    $query = " UPDATE contatos 
    SET id_categoria = '$idCategoria', nome = '$nome', email = '$email', 
    telefone = '$telefone' 
    WHERE id = '$idContato' ";

    break;  
}
if (isset($get['delete'])) { 
     echo  $query = "DELETE FROM contatos WHERE  id = ".$get['id'];
}  
$select = $db->query($query);


header("Location: index.php");
?>

 
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
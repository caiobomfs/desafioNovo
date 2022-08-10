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

$idCategoria   = $post['idCategoria']; 
$categoriaNome = $post['categoria'];

//switch de ações (insert e update)
switch ($post['acao']) {

  case 'criar':
      $query = "INSERT INTO `categorias` (`categoria`)
      VALUES ('$categoriaNome');";
      break;
  case 'edit':
      $query = "UPDATE categorias 
      SET categoria = '$categoriaNome'
      WHERE id = '$idCategoria' ";  
}

//Apaga todas as categorias
if (isset($get['deleteAll']))
    echo $query = "DELETE From categorias";

//Apaga a categoria selecionada
if (isset($get['delete']))
  $query = "DELETE From categorias WHERE  id = ".$get['id'];

//Executa todas as ações de CRUD no banco
$select = $db->query($query);


//Rediciona a página após as ações do banco.
header("Location: gestaoCatego.php");

?>
<script>
  if ( window.history.replaceState )
    window.history.replaceState( null, null, window.location.href );
</script>
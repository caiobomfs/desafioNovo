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
// require './../../config/config.php';
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$active1 = "active";
$active2 = "";
$display = "d-none";
if (strpos($url, 'categoria') !== false) {
    $active1 = "";
    $active2 = "active";
    $display = "d-block";
}

?>


<nav class="navbar navbar-expand-lg navbar-light  border  border-dark p-0 m-2">
  <a class="navbar-brand border  border-dark p-3 m-0" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item <?php echo $active1;?> ">
  <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item <?php echo $active2; ?>">
  <a class="nav-link" href="/modulos/categorias/index.php">Categorias <span class="sr-only">(current)</span></a>
  </li>


  </div>
  </nav>
  <nav  class="m-2" aria-label="breadcrumb">
      <ol class="breadcrumb border border-dark bg-white">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item <?php echo $active2; echo$display; ?>" aria-current="page">Categorias</a></li>
      </ol>
    </nav> 
<?php
/**
 * Config
 * arquivo q faz a conexão com o banco de dados
 * php version  8.1.4
 * 
 * @category Text/MySQL
 * @package  MySQL
 * @author   Caio Bomfim <caiobomfimfc@gmail.com>
 * @license  https://github.com/caiobomfs/testecrud 
 * @link     https://github.com/caiobomfs/testecrud 
 */
  $srv = '127.0.0.1';
  $usr ='root';
  $pas ='';
  $bas ='agenda';

  $db = new mysqli($srv, $usr, $pas, $bas);


  //ini_set('display_errors', 'off');
?>
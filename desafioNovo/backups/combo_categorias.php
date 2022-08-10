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


$query2 = "SELECT * FROM categorias";
$select_edit2 = $db->query($query2);

?>
<select name="id_categoria" id="id_categoria">
    <?php
    while ($list2 = $select_edit2->fetch_assoc()) {

        if (isset($list2['id'])&& $list2['id'] == $idCategoria) {
            $selected = "selected";
        
        } else {
            $selected = "";
        }
        ?><option value="<?php echo$list2['id']?>" <?php echo $selected; ?> ><?php echo$list2['categoria']?></option><?php 
    }
    ?>
</select>
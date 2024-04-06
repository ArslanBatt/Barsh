<?php
include "../connect.php"; 
if(isset($_POST['delete_product'])){
    $Id_product = $_POST['Id_product'];
    // Удаление товара из базы данных
    $delete_sql = "DELETE FROM Product WHERE Id_product = $Id_product";
}
header('Location: index.php'); 

?>

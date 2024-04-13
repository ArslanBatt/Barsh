<?php
include "../connect.php";

$Id_product = $_POST['Id_product'];

$sql = "DELETE FROM `Product` WHERE Id_product = $Id_product";
$result = mysqli_query($con, $sql);
header('Location: index.php');
?>
<?php
 include "../connect.php";

// // удаление заказа
$id = $_GET['item'];
$id_ord = $_GET['itenOr'];
$result = mysqli_query($con,"DELETE FROM  `Order_Product` WHERE `id` = $id");
// $sql = mysqli_fetch_assoc(mysqli_query($con, "SELECT id_order FROM `Order_Product`"));
$result = mysqli_query($con,"DELETE FROM `Orders`  WHERE `Id_order` = $id_ord");
echo "<script>alert('Заказ удален!'); location.href = 'orderManagement.php';</script>";
?>

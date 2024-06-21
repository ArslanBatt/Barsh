 <?php
 include "../connect.php";

// // удаление товара
$id = $_GET['item'];
$result = mysqli_query($con,"DELETE FROM `Product` WHERE `Id_product` = $id");
echo "<script>alert('Данные удалены!'); location.href = 'newTovar.php';</script>";
    ?>



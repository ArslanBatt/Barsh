<?php
include "../connect.php";
$id = isset($_GET['item'])?$_GET['item']:false;
$result = mysqli_query($con,"DELETE  FROM `Category` WHERE `Category_id` = $id");
$result_1 = mysqli_query($con,"DELETE  FROM `Product` WHERE `Category_id` = $id");
 echo "<script>alert('Категория удалена');location.href = 'categoryTovar.php';
    </script>";
?>

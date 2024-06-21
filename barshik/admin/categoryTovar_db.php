<?php
include "../connect.php"; 

$Name = isset($_POST['Name']) ? $_POST['Name'] : false; 
$add = isset($_POST['add']) ? $_POST['add'] : false; 

if (!empty($add) && $Name) {
    $queryAdd = "INSERT INTO `Category`(`Name`) VALUES (?)";
    $stmt = mysqli_prepare($con, $queryAdd);
    mysqli_stmt_bind_param($stmt, "s", $Name);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Категория создана!');location.href = 'categoryTovar.php';</script>";
    } else {
        echo "<script>alert('Ошибка при создании категории');location.href = 'categoryTovar.php';</script>";
    }
    mysqli_stmt_close($stmt);
}
?>

<?php
include "../connect.php";
$id = isset($_POST['id']) ? $_POST['id'] : false;
$Name = isset($_POST['Name']) ? $_POST['Name'] : false;

if (!$id || !$Name) {
    echo "<script>alert('Некорректные данные');location.href = 'categoryTovar.php';</script>";
    exit;
}

$stmt = $con->prepare("UPDATE Category SET Name = ? WHERE Category_id = ?");
$stmt->bind_param("si", $Name, $id);

if ($stmt->execute()) {
    echo "<script>alert('Категория изменена');location.href = 'categoryTovar.php';</script>";
} else {
    echo "<script>alert('Ошибка при обновлении категории');location.href = 'categoryTovar.php';</script>";
}

$stmt->close();
?>

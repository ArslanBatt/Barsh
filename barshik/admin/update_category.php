<?php
include "../connect.php";

if(isset($_POST['edit'])) {
    $category_id = $_POST['Category_id'];
    $name = $_POST['Name'];

    $sql = "UPDATE Category SET `Name` = '$name' WHERE Category_id = '$category_id'";

    if (mysqli_query($con, $sql)) {
        echo "Категория успешно обновлена.";
        header('Location: index.php');
    } else {
        echo "Ошибка при обновлении категории: " . mysqli_error($con);
    }
}
?>
